<?php

use App\Http\Controllers\AdminBukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminKategoriBukuController;
use App\Http\Controllers\AdminPeminjamanController;
use App\Http\Controllers\adminUlasanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('ceksiswa',function(){return 'siswa berhasil';})->middleware('auth:web');
Route::get('cekadmin',function(){return 'siswa berhasil';})->middleware('AdminMiddleware');
Route::prefix('admin')->group(function(){
    // login admin
    Route::get('login',[AuthController::class,'formLoginAdmin'])->name('login.admin');
    Route::post('login',[AuthController::class,'loginAdminProses'])->name('login.admin.proses');
    // admin
    // Route::middleware('AdminMiddleware')->group(function(){
    Route::middleware('AdminMiddleware')->group(function(){
        Route::get('/',[AdminController::class,'dashboard'])->name('admin.dashboard');

        // buku
        Route::resource('buku',AdminBukuController::class);
        Route::resource('kategori',AdminKategoriBukuController::class);
        Route::resource('peminjaman',AdminPeminjamanController::class);
        Route::resource('ulasan',adminUlasanController::class);
        Route::resource('petugas',AdminController::class);
        Route::post('peminjaman/{peminjaman}',[AdminPeminjamanController::class,'kembali'])->name('peminjaman.kembali');
        Route::get('peminjaman/downloadlaporan/form',[AdminPeminjamanController::class,'laporanDownloadForm'])->name('laporan.download.form');
        Route::get('peminjaman/downloadlaporan/proses/',[AdminPeminjamanController::class,'laporanDownloadProses'])->name('laporan.download.proses');

        Route::get('peminjam',[SiswaController::class,'daftarpeminjam'])->name('xixixi');


        Route::get('peminjaman/laporan/form',[AdminPeminjamanController::class,'laporanForm'])->name('laporan.form');
        Route::get('peminjaman/laporan/form/proses/',[AdminPeminjamanController::class,'laporanProses'])->name('laporan.proses');
        // Route::get('peminjaman/laporan',[AdminPeminjamanController::class,'laporanForm'])->name('laporan.form');

        // logout admin
        Route::post('logout',[AuthController::class,'logoutAdmin'])->name('logout.admin');
    });
});



Route::prefix('siswa')->group(function(){
    // login siswa
    Route::get('login',[AuthController::class,'formLoginSiswa'])->name('login');
    Route::get('register',[AuthController::class,'formRegisterSiswa'])->name('register');
    Route::post('login',[AuthController::class,'loginSiswaProses'])->name('login.proses');
    Route::post('register',[AuthController::class,'registerSiswaProses'])->name('register.proses');
    Route::middleware('auth:web')->group(function(){
        // Route::get('/',[AdminController::class,'dashboard'])->name('admin.dashboard');
        Route::get('/',[SiswaController::class,'dashboard'])->name('siswa.dahsboard');
        Route::get('/daftarbuku',[SiswaController::class,'buku'])->name('siswa.daftar.buku');
        Route::get('/daftarbuku/{buku}',[SiswaController::class,'detailbuku'])->name('siswa.detail.buku');
        Route::get('/baca/{buku}',[SiswaController::class,'bacabuku'])->name('siswa.baca.buku');
        Route::get('/dipinjam',[SiswaController::class,'bukudipinjam'])->name('siswa.pinjam.buku');
        Route::get('/historypinjam',[SiswaController::class,'historypinjam'])->name('siswa.history.buku');
        Route::post('/pinjam/{id}',[SiswaController::class,'pinjam'])->name('siswa.pinjam.buku.proses');
        Route::put('/pinjam/kembali/{id}',[SiswaController::class,'kembali'])->name('siswa.kembali.buku');
        Route::post('/favorite/{buku}',[SiswaController::class,'toggle'])->name('siswa.favorit.toggle');
        Route::get('/favorite',[SiswaController::class,'favorit'])->name('siswa.favorit.show');
        Route::get('/profile',[SiswaController::class,'profile'])->name('siswa.profile');

        Route::post('/ulasan/{buku}',[SiswaController::class,'tambahulasan'])->name('siswa.ulasan');

        // logout admin
        Route::post('logout',[AuthController::class,'logoutSiswa'])->name('logout.siswa');
    });
});
