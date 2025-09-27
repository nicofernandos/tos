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
        return view('user.siswa', compact('siswa'));
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

    public function penilaian(){
        return view('user.penilaian');
    }

    public function penilaiansiswa(){
        return view('user.penilaiansiswa');
    }

    public function nilaisiswa(){
        return view('user.nilaisiswa');
    }

    public function catatankasus(){
        return view('user.catatankasus');
    }

    public function catatankasussiswa(){
        return view('user.catatankasussiswa');
    }

    public function jurnalkonseling(){
        return view('user.jurnalkonseling');
    }
    
    public function jurnalkonselingsiswa(){
        return view('user.jurnalkonselingsiswa');
    }

    public function raport(){
        return view('user.raport');
    }

    public function raportsiswa(){
        return view('user.raportsiswa');
    }

    public function info(){
        return view('user.info');
    }
}