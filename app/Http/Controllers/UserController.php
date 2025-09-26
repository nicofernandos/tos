<?php
namespace App\Http\Controllers;
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
        return view('user.sekolah');
    }

    public function kelas(){
        return view('user.kelas');
    }

    public function siswa(){
        return view('user.siswa');
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

}