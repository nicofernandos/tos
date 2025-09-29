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
Route::get('/datasiswa',[UserController::class,'datasiswa']);

//2B
Route::get('/absensisiswa',[UserController::class,'absensisiswa']);

//2C
Route::get('/suratizin',[UserController::class,'suratizin']);

//2D
Route::get('/tugas',[UserController::class,'tugas']);

//2E
Route::get('/penilaian/{nam}', [UserController::class, 'penilaian']);

//2.E.1
Route::get('/penilaiansiswa',[UserController::class,'penilaiansiswa']);

//2.E.1.A
Route::get('/nilaisiswa',[UserController::class,'nilaisiswa']);

//2.F
Route::get('/catatankasus/{nam}',[UserController::class,'catatankasus']);

//2.F.1
Route::get('/catatankasussiswa',[UserController::class,'catatankasussiswa']);

//2.G
Route::get('/jurnalkonseling/{nam}',[UserController::class,'jurnalkonseling']);

//2.G.1
Route::get('/jurnalkonselingsiswa',[UserController::class,'jurnalkonselingsiswa']);


//2.H
Route::get('/raport/{nam}',[UserController::class,'raport']);

//2.H.1
Route::get('/raportsiswa',[UserController::class,'raportsiswa']);


//2.I
Route::get('/info',[UserController::class,'info']);


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Auth
Route::middleware(['isLogin'])->controller(AdminController::class)->group(function () {
    
});