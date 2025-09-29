<?php
namespace App\Http\Controllers;
use App\Models\Tkelas;
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
        $kelas = Tkelas::where('tin',4)->where('jen',4)->get();     
        return view('user.sekolah',compact('kelas'));
    }

    public function kelas($id){
        $isikelas = Tkelas::where('id',$id)->firstOrFail();
        return view('user.kelas', compact('isikelas'));
    }

    public function siswa($nam){
        $siswa = Tsiswa::where('kel',$nam)->get(); 
        $isikelas = Tkelas::where('nam',$nam)->first();
        return view('user.siswa', compact('siswa','isikelas'));
    }

    public function datasiswa(){
        return view('user.datasiswa');
    }

    public function absensisiswa(){
        return view('user.absensisiswa');
    }

    public function suratizin(){
        return view('user.suratizin');
    }

    public function tugas(){
        return view('user.tugas');
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

        $isisiswa = Tkelas::where('nam',$nam)->first();
        return view('user.catatankasus',compact('siswa','isikelas'));
    }

    public function catatankasussiswa(){
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

    public function info(){
        return view('user.info');
    }
}