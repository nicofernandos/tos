<?php
namespace App\Http\Controllers;
use App\Models\Tkelas;
use Illuminate\Validation\Rule;
use App\Models\Tinfo;
use App\Models\Tkelasjenis;
use App\Models\Tsiswa;
use App\Models\Ttugas;
use App\Models\Ttugas1;
use App\Models\Tcatsus;
use App\Models\Tcatsus1;
use App\Models\Ttingkat;
use App\Models\Tkelsis;
use App\Models\Tpelajaran;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Midtrans\Snap;
use Midtrans\Config;    
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{

    public function jenjang()
    {
        $jenjang = Ttingkat::all();
        return view('user.jenjang',compact('jenjang'));
    }

    // public function sekolah($tin){
        // $kelas      = Tkelas::where('tin',4)->where('jen',4)->withCount('kelassiswa')->get();
    //      $jenjang    = Ttingkat::where('id',$tin)->first();
    //      $kelas      = Tkelas::with('tahunajaran')->where('tin',$tin)->where('jen',$tin)->where('staakt',1)->withCount('jumlahsiswa')->get();
    //      return view('user.sekolah',compact('kelas','jenjang'));
    // }

    public function sekolah($tin)
    {
        $jenjang = Ttingkat::where('id', $tin)->first();

        $kelas = Tkelas::with(['tahunajaran'])
            ->where('tin', $tin)
            ->where('jen', $tin)
            ->whereHas('tahunajaran', function ($q) {
                $q->where('staakt', 1);
            })
            ->withCount('jumlahsiswa')
            ->get();
        return view('user.sekolah', compact('kelas', 'jenjang'));
    }


    public function kelas($id){
        $isikelas   = Tkelas::where('id',$id)->withCount('jumlahsiswa')->firstOrFail();
        return view('user.kelas', compact('isikelas'));
    }

    public function siswa($id){
        $isikelas = Tkelas::findOrFail($id);

        $siswa    = Tkelsis::with(['siswa','detailsiswa','kelas'])
                  ->where('idkel',$id)
                  ->get();
        return view('user.siswa', compact('siswa','isikelas'));
    }

    public function datasiswa($id){
        // $detailsiswa = Tsiswa::with('detailsiswa','detail')->findOrFail($id);

        $detailsiswa    = Tsiswa::with('detailsiswa', 'detail', 'kelas.tahunajaran')
                         ->findOrFail($id);
        // dd($detailsiswa);
        $namakelas      = $detailsiswa->kel;
        if($detailsiswa->detailsiswa && $detailsiswa->detailsiswa->img){
            $detailsiswa->detailsiswa->img_base64 = base64_encode($detailsiswa->detailsiswa->img);
        }
        return view('user.datasiswa',compact('detailsiswa','namakelas') );
    }

    public function absensisiswa($id){
        $isikelas = Tkelas::findOrFail($id);

        $siswa    = Tkelsis::with(['siswa','detailsiswa','kelas'])
                        ->where('idkel',$id)
                        ->get();
        return view('user.absensisiswa', compact('siswa','isikelas'));
    }

    public function suratizin($id)
    {
        $isikelas = Tkelas::findOrFail($id);
        $siswa = Tkelsis::with(['siswa', 'detailsiswa', 'kelas'])
                    ->where('idkel', $id)
                    ->get();

        return view('user.suratizin', compact('isikelas', 'siswa'));
    }


    public function tugas($id){
        $isikelas   = Tkelas::findOrFail($id);
        $siswa      = Tsiswa::where('kel',$isikelas->nam)
                    -> orderBy('namlen','asc')
                    ->get();

        return view('user.tugas',compact('siswa','isikelas'));
        

    }

    public function tugassimpan(Request $request)
    {
        try {
            $validate = $request->validate([
                'idkelas' => 'required|integer',
                'idguru' => 'required|integer',
                'mapel' => 'required|string|max:200',
                'tglpenugasan' => 'required|date',
                'tglpengumpulan' => 'nullable|date',
                'judul' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'lampiran' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
                'tugasFor' => 'required|in:kelas,siswa',
                'siswa_ids' => 'required_if:tugasFor,siswa|array|min:1', 
                'siswa_ids.*' => 'integer|exists:maidatmaspusat.tsiswa,id', 
            ], [
                'siswa_ids.required_if' => 'Pilih minimal 1 siswa untuk tugas tertentu',
                'siswa_ids.min' => 'Pilih minimal 1 siswa',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        }

        FacadesDB::beginTransaction(); 
        
        try {
            $pathLampiran = null;
            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $namaFile = time() . '_' . $file->getClientOriginalName();
                $pathLampiran = $file->storeAs('lampiran_tugas', $namaFile, 'public');
            }

            $idTugas = Ttugas::max('id') ?? 0;
            $idBaru = $idTugas + 1;

            $tugas = Ttugas::create([
                'id' => $idBaru,
                'idkelas' => $request->idkelas,
                'idguru' => $request->idguru,
                'mapel' => $request->mapel,
                'tglpenugasan' => $request->tglpenugasan,
                'tglpengumpulan' => $request->tglpengumpulan,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'lampiran' => $pathLampiran,
                'tugasFor' => $request->tugasFor,
                'createat' => now(),
                'createby' => auth()->user()->name ?? 'system',
            ]);
            if ($request->tugasFor === 'kelas') {
                $siswaList = Tsiswa::where('kel', $request->idkelas)->pluck('id')->toArray();
            } else {
                $siswaList = $request->siswa_ids ?? [];
            }
            if (empty($siswaList)) {
                throw new \Exception('Tidak ada siswa yang dipilih');
            }
            $startId = Ttugas1::max('id') ?? 0;
            $dataInsert = [];

            foreach ($siswaList as $index => $idsiswa) {
                $dataInsert[] = [
                    'id'        => $startId + $index + 1,
                    'idtugas'   => $idBaru,
                    'idsiswa'   => $idsiswa,
                    'status'    => 'belum',
                    'nilai'     => null,
                    'catatan'   => null,
                    'createat'  => now(),
                    'createby'  => auth()->user()->name ?? 'system',
                ];
            }
            Ttugas1::insert($dataInsert);

            FacadesDB::commit(); 
            
            Alert::success('Success', 'Tugas berhasil diberikan');
            return redirect()->back();
            
        } catch (\Exception $e) {
            FacadesDB::rollback(); 
            
            Alert::error('Error', 'Gagal menyimpan tugas: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    // public function penilaian($nam){
    //     $siswa      = Tsiswa::where('kel',$nam)->get(); 
    //     $isikelas   = Tkelas::where('nam',$nam)->first();
    //     return view('user.penilaian',compact('siswa','isikelas'));
    // }

    public function penilaian($idkel)
    {
        //bener
        $isikelas = Tkelas::findOrFail($idkel);

        // dd($isikelas)
        $kelsis = Tkelsis::with('siswa')
                    ->where('idkel', $idkel)
                    ->get();
    
        $siswa = $kelsis->map(function ($item) {
            return $item->siswa;
        });


        return view('user.penilaian', compact('isikelas', 'siswa'));
    }


    public function penilaiansiswa($id)
    {
        // Ambil data siswa dan detailnya
        $siswa = Tsiswa::with('detail')->findOrFail($id);

        // Cari kelas berdasarkan nama kelas siswa
        $isikelas = Tkelas::where('nam', $siswa->kel)->first();

        // Ambil semua pelajaran dari kelas tersebut
        $pelajaran = [];
        if ($isikelas) {
            $pelajaran = Tpelajaran::where('idk', $isikelas->id)->get();
        }

        return view('user.penilaiansiswa', compact('siswa', 'isikelas', 'pelajaran'));
    }

    public function nilaisiswa($id,$idp)
    {
        $siswa = Tsiswa::with('detail')->findOrFail($id);
        $pelajaran = Tpelajaran::with('kelas')->findOrFail($idp);
        return view('user.nilaisiswa',compact('siswa','pelajaran'));
    }

    public function catatankasus($id){
        $isikelas = Tkelas::findOrFail($id);
        $siswa    = Tkelsis::with(['siswa','detailsiswa'])
                    ->where('idkel',$id)
                    ->get();
        return view('user.catatankasus',compact('siswa','isikelas'));
    }


    public function catatankasussiswa($id){
        $siswa      = Tsiswa::with('detail','kelas')->findOrFail($id);
        return view('user.catatankasussiswa',compact('siswa'));
    }

    // public function catatankasussiswasimpan(Request $request)
    // {
        
    //     try{
    //         $validate = $request->validate([
    //             'tanggal'       =>  'require|data',
    //             'namaguru'      =>  'required|string|max:100',
    //             'deskrsipsi'    =>  'required|integer',
    //             'jumlahpoin'    =>  'required|integer',
    //             'kelas'         =>  'nullable|string|max',
    //             'idkelas'       =>  'string|integer',
    //         ]);
    //         dd($validate);
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return redirect()->back()
    //             ->withErrors($e->errors())
    //             ->withInput();
    //     }

    //     $request->validate([
    //         'tanggal'       => 'required|data',
    //         'namaguru'      => 'required|string|max:100',
    //         'deskripsi'     => 'required|integer',
    //         'jumlahpoin'    => 'required|integer',
    //         'kelas'         => 'nullable|string|max',
    //         'idkelas'       => 'string|integer',   
    //     ]);
    //     $id = now()->timestamp;
    //     $catsus = Tcatsus::create([
    //         'id'            => $id,
    //         'tanggal'       => $request->tanggal,
    //         'namaguru'      => $request->namaguru,
    //         'deskripsi'     => $request->deskripsi,
    //         'jumlahpoin'    => $requestp->jumlahpoin,
    //         'kelas'         => $request->kelas,
    //         'idsiswa'       => $request->idsiswa,
    //         'createat'      => now(),
    //         'createby'      => auth()->user()->name ?? 'Admin',
    //     ]);
    //     Alert::success('Success','Berhasil menambahkan kasus kepada siswa');
    //     return view('user.catatankasussiswa');
    // }


    public function catatankasussiswasimpan(Request $request)
    {
        try {
            $validate = $request->validate([
                'tanggal'     => 'required|date',
                'namaguru'    => 'required|string|max:100',
                'deskripsi'   => 'required|string',
                'jumlahpoin'  => 'required|integer',
                'kelas'       => 'nullable|string|max:100',
                'idkelas'     => 'nullable|integer',
                'idsiswa'     => 'required|integer',
                'details'     => 'nullable|array',
                'details.*.detail'      => 'nullable|string|max:255',
                'details.*.keterangan'  => 'nullable|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        }

        FacadesDB::beginTransaction();
        try {

            $id = now()->timestamp;

            $catsus = Tcatsus::create([
                'id'          => $id,
                'tanggal'     => $request->tanggal,
                'namaguru'    => $request->namaguru,
                'deskripsi'   => $request->deskripsi,
                'jumlahpoin'  => $request->jumlahpoin,
                'kelas'       => $request->kelas,
                'idkelas'     => $request->idkelas,
                'idsiswa'     => $request->idsiswa,
                'createat'    => now(),
                'createby'    => auth()->user()->name ?? 'Admin',
            ]);

            if (!empty($request->details)) {
                foreach ($request->details as $detail) {
                    if (empty($detail['detail']) && empty($detail['keterangan'])) {
                        continue;
                    }

                    Tcatsus1::create([
                        'idcatsus'   => $catsus->id,
                        'detail'     => $detail['detail'] ?? null,
                        'keterangan' => $detail['keterangan'] ?? null,
                        'createat'   => now(),
                        'createby'   => auth()->user()->name ?? 'Admin',
                    ]);
                }
            }

            FacadesDB::commit();

            Alert::success('Success', 'Berhasil menambahkan kasus kepada siswa');
            return redirect()->back();

        } catch (\Exception $e) {
            FacadesDB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }


    // public function jurnalkonseling($id){
    //     $siswa      = Tsiswa::with('detail')
    //     ->where('kel',$nam)
    //     ->get();
    //     $isikelas   = Tkelas::where('nam',$nam)->first();
    //     return view('user.jurnalkonseling',compact('siswa','isikelas'));
    // }
    
    public function jurnalkonseling($id)
    {
        $isikelas = Tkelas::findOrFail($id);
        $siswa = Tkelsis::with(['siswa','detailsiswa'])
                ->where('idkel',$id)
                ->get();
        return view('user.jurnalkonseling', compact('siswa', 'isikelas'));
    }


    
    public function jurnalkonselingsiswa($idk,$ids){
        $siswa      = Tkelsis::with(['siswa','detailsiswa','kelas'])
                    ->where('ids',$ids)
                    ->where('idkel',$idk)
                    ->firstOrFail();
        $isikelas = Tkelas::findOrFail($idk);
        return view('user.jurnalkonselingsiswa', compact('siswa','isikelas'));
    }

    // public function raport($nam){
    //     $siswa      = Tsiswa::with('detail')
    //     ->where('kel',$nam)
    //     ->get();

    //     $isikelas   = Tkelas::where('nam',$nam)->first();

    //     return view('user.raport',compact('siswa','isikelas'));
    // }

    public function raport($id)
    {
        $isikelas   = Tkelas::findOrFail($id);
        $siswa      = Tkelsis::with(['siswa','detailsiswa','tahunajaran'])
                    ->where('idkel',$id)
                    ->get();    
        return view('user.raport', compact('isikelas','siswa'));
    }

    public function raportsiswa($idk,$ids){
        $siswa      = Tkelsis::with(['siswa','detailsiswa','kelas'])
                    ->where('ids',$ids)
                    ->where('idkel',$idk)
                    ->firstOrFail();
        $isikelas = Tkelas::findOrFail($idk);
        return view('user.raportsiswa',compact('siswa','isikelas'));
    }

    public function info($id)
    {
        $isikelas   = Tkelas::findOrFail($id);
        $idkelas    = $isikelas->id;
        return view('user.info', compact('isikelas', 'idkelas'));
    }

    public function simpaninfo(Request $request)
    {
        $validated = $request->validate([
            'idkelas' => [
                'required',
                'integer',
                Rule::exists((new Tkelas)->getConnectionName().'.'.(new Tkelas)->getTable(), 'id')
            ],
            'tglinfo'   => 'required|date',
            'deskripsi' => 'required|string',
        ]);
        $kelas = Tkelas::findOrFail($validated['idkelas']);
        $idBerikutnya = Tinfo::max('id') + 1;
        
        Tinfo::create([
            'id'        => $idBerikutnya,
            'idkelas'   => $validated['idkelas'],
            'tglinfo'   => $validated['tglinfo'],
            'deskripsi' => $validated['deskripsi'],
            'createat'  => now(),
            'createby'  => auth()->user()->name ?? 'System Manual',
        ]);

        Alert::success('Success', 'Berhasil memberikan info ke kelas: ' . $kelas->nam);
        return redirect('kelas/' . $kelas->id);
    }



}