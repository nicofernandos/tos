<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', function () {
    return redirect('/sekolah');
});


Route::get('/sekolah',[UserController::class,'sekolah']);
Route::get('/kelas',[UserController::class,'kelas']);
Route::get('/siswa',[UserController::class,'siswa']);
Route::get('/absensisiswa',[UserController::class,'absensisiswa']);
Route::get('/suratizin',[UserController::class,'suratizin']);
Route::get('/tugas',[UserController::class,'tugas']);
Route::get('/penilaian',[UserController::class,'penilaian']);
Route::get('/penilaiansiswa',[UserController::class,'penilaiansiswa']);
Route::get('/nilaisiswa',[UserController::class,'nilaisiswa']);
Route::get('/catatankasus',[UserController::class,'catatankasus']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['isLogin'])->controller(AdminController::class)->group(function () {
    
});