<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', function () {
    return redirect('/sekolah');
});

//1
Route::get('/sekolah',[UserController::class,'sekolah']);

//2
Route::get('/kelas/{id}',[UserController::class,'kelas']);

//2A
Route::get('/siswa/{nam}',[UserController::class,'siswa']);

//2.A.1
Route::get('/datasiswa/{id}',[UserController::class,'datasiswa']);

//2B
Route::get('/absensisiswa/{nam}',[UserController::class,'absensisiswa']);

//2C
Route::get('/suratizin/{nam}',[UserController::class,'suratizin']);

//2D
Route::get('/tugas/{nam}',[UserController::class,'tugas']);
Route::post('/tugassimpan',[UserController::class,'tugassimpan']);

//2E
Route::get('/penilaian/{nam}', [UserController::class, 'penilaian']);

//2.E.1
Route::get('/penilaiansiswa',[UserController::class,'penilaiansiswa']);

//2.E.1.A
Route::get('/nilaisiswa',[UserController::class,'nilaisiswa']);

//2.F
Route::get('/catatankasus/{nam}',[UserController::class,'catatankasus']);

//2.F.1
Route::get('/catatankasussiswa/{id}',[UserController::class,'catatankasussiswa']);
Route::get('/catatankasussiswasimpan',[UserController::class,'catatankasussiswasimpan']);

//2.G
Route::get('/jurnalkonseling/{nam}',[UserController::class,'jurnalkonseling']);

//2.G.1
Route::get('/jurnalkonselingsiswa/{id}',[UserController::class,'jurnalkonselingsiswa']);
Route::get('/jurnalkonselingsiswasimpan',[UserController::class,'jurnalkonselingsiswasimpan']);

//2.H
Route::get('/raport/{nam}',[UserController::class,'raport']);

//2.H.1
Route::get('/raportsiswa',[UserController::class,'raportsiswa']);


//2.I
Route::get('/info/{nam}',[UserController::class,'info']);
Route::post('/simpaninfo',[UserController::class,'simpaninfo']);


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Auth
Route::middleware(['isLogin'])->controller(AdminController::class)->group(function () {

});