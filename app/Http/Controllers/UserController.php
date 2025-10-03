<?php
namespace App\Http\Controllers;
use App\Models\Tkelas;
use Illuminate\Validation\Rule;
use App\Models\Tinfo;
use App\Models\Tkelasjenis;
use App\Models\Tsiswa;
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

    public function sekolah(){
        $kelas = Tkelas::where('tin',4)->where('jen',4)->withCount('jumlahsiswa')->get();
        return view('user.sekolah',compact('kelas'));
    }

    public function kelas($id){
        $isikelas = Tkelas::where('id',$id)->withCount('jumlahsiswa')->firstOrFail();
        return view('user.kelas', compact('isikelas'));
    }

    public function siswa($nam){
        $siswa = Tsiswa::where('kel',$nam)
        ->orderBy('namlen','asc')
        ->get(); 
        $isikelas = Tkelas::where('nam',$nam)->first();
        return view('user.siswa', compact('siswa','isikelas'));
    }

    public function datasiswa($id){
        // $detailsiswa = Tsiswa::with('detailsiswa','detail')->findOrFail($id);

        $detailsiswa = Tsiswa::with('detailsiswa', 'detail', 'kelas.tahunajaran')
                         ->findOrFail($id);
        $namakelas = $detailsiswa->kel;
        if($detailsiswa->detailsiswa && $detailsiswa->detailsiswa->img){
            $detailsiswa->detailsiswa->img_base64 = base64_encode($detailsiswa->detailsiswa->img);
        }
        return view('user.datasiswa',compact('detailsiswa','namakelas') );
    }

    public function absensisiswa($nam){
        $siswa = Tsiswa::where('kel', $nam)
        ->orderBy('namlen','asc')
        ->get();
        $isikelas = Tkelas::where('nam',$nam)->first();
        return view('user.absensisiswa', compact('siswa','isikelas'));
    }

    public function suratizin($nam){
        $siswa = Tsiswa::where('kel',$nam)
        ->orderBy('namlen','asc')
        ->get();
        $isikelas = Tkelas::where('nam',$nam)->first();
        return view('user.suratizin',compact('isikelas','siswa') );
    }

    public function tugas($nam){
        $siswa = Tsiswa::where('kel',$nam)
        ->orderBy('namlen','asc')
        ->get();
        $isikelas = Tkelas::where('nam',$nam)->first();
        return view('user.tugas',compact('siswa','isikelas'));
    }

    public function tugassimpan(Request $request)
    {
        $request->validate([
            'idkelas' => 'required|integer',
            'idguru' => 'required|integer',
            'mapel' => 'required|string|max:200',
            'tglpenugasan' => 'required|date',
            'tglpengumpulan' => 'nullable|date',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lampiran' => 'nullable|string',
            'tugasFor' => 'required|in:kelas,siswa',
            'siswa_ids' => 'array',
        ]);
        $tugas = Ttugas::create([
            'idkelas' => $request->idkelas,
            'idguru' => $request->idguru,
            'mapel' => $request->mapel,
            'tglpenugasan' => $request->tglpenugasan,
            'tglpengumpulan' => $request->tglpengumpulan,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'lampiran' => $request->lampiran,
            'tugasFor' => $request->tugasFor,
            'createat' => now(),
            'createby' => auth()->user()->name ?? 'system',
        ]);
        if ($request->tugasFor === 'kelas') {
            $siswaList = Tsiswa::where('idkelas', $request->idkelas)->pluck('id');
            foreach ($siswaList as $idsiswa) {
                Ttugas1::create([
                    'idtugas' => $tugas->id,
                    'idsiswa' => $idsiswa,
                    'status' => 'belum',
                    'nilai' => null,
                    'catatan' => null,
                    'createat' => now(),
                    'createby' => auth()->user()->name ?? 'system',
                ]);
            }
        } 
        elseif ($request->tugasFor === 'siswa' && $request->has('siswa_ids')) {
            foreach ($request->siswa_ids as $idsiswa) {
                Ttugas1::create([
                    'idtugas' => $tugas->id,
                    'idsiswa' => $idsiswa,
                    'status' => 'belum',
                    'nilai' => null,
                    'catatan' => null,
                    'createat' => now(),
                    'createby' => auth()->user()->name ?? 'system',
                ]);
            }
        }

        return redirect()->back()->with('success', 'Tugas berhasil disimpan!');
    }



    public function penilaian($nam){
        $siswa = Tsiswa::where('kel',$nam)->get(); 
        $isikelas = Tkelas::where('nam',$nam)->first();
        return view('user.penilaian',compact('siswa','isikelas'));
    }

    public function penilaiansiswa(){
        return view('user.penilaiansiswa');
    }

    public function nilaisiswa(){

        return view('user.nilaisiswa');
    }

    public function catatankasus($nam){
        $siswa = Tsiswa::with('detail')
        ->where('kel',$nam)
        ->get();
        $isikelas = Tkelas::where('nam',$nam)->first();
        return view('user.catatankasus',compact('siswa','isikelas'));
    }

    public function catatankasussiswa($id){
        $siswa = Tsiswa::with('detail')->findOrFail($id);
        return view('user.catatankasussiswa',compact('siswa'));
    }

    public function catatankasussiswasimpan(Request $request)
    {
        $request->validate([
            'tanggal'       => 'required|data',
            'namaguru'      => 'required|string|max:100',
            'deskripsi'     => 'required|integer',
            'jumlahpoin'    => 'required|integer',
            'kelas'         => 'nullable|string|max',
            'idkelas'       => 'string|integer',   
        ]);
        $id = now()->timestamp;
        $catsus = Tcatsus::create([
            'id'            => $id,
            'tanggal'       => $request->tanggal,
            'namaguru'      => $request->namaguru,
            'deskripsi'     => $request->deskripsi,
            'jumlahpoin'    => $requestp->jumlahpoin,
            'kelas'         => $request->kelas,
            'idsiswa'       => $request->idsiswa,
            'createat'      => now(),
            'createby'      => auth()->user()->name ?? 'Admin',
        ]);
        Alert::success('Success','Berhasil menambahkan kasus kepada siswa');
        return view('user.catatankasussiswa');
    }

    public function jurnalkonseling($nam){
        $siswa = Tsiswa::with('detail')
        ->where('kel',$nam)
        ->get();

        $isikelas = Tkelas::where('nam',$nam)->first();
        return view('user.jurnalkonseling',compact('siswa','isikelas'));
    }
    
    public function jurnalkonselingsiswa(){
        return view('user.jurnalkonselingsiswa');
    }

    public function raport($nam){
        $siswa = Tsiswa::with('detail')
        ->where('kel',$nam)
        ->get();

        $isikelas = Tkelas::where('nam',$nam)->first();

        return view('user.raport',compact('siswa','isikelas'));
    }

    public function raportsiswa(){
        return view('user.raportsiswa');
    }

    public function info($nam)
    {
        $isikelas = Tkelas::where('nam', $nam)->firstOrFail();
        $idkelas = $isikelas->id;
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