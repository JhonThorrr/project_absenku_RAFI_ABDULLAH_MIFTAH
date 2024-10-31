<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AbsensiGuruController;


// Rute untuk halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk halaman utama absensi
Route::get('/', [AbsensiController::class, 'index'])->name('absensi.index');

// Rute untuk menyimpan data absensi siswa
Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');

// Rute untuk halaman absensi siswa
Route::get('/absensi-siswa', [AbsensiController::class, 'index'])->name('absensi.siswa');

// Rute untuk halaman absensi guru
Route::get('/absensi-guru', [AbsensiGuruController::class, 'index'])->name('absensi.guru');

// Rute untuk rekap bulanan
Route::get('/rekap-bulanan', [AbsensiController::class, 'rekapBulanan'])->name('rekap.bulanan');

// Rute untuk rekap bulanan absensi guru
Route::get('/rekap-bulanan-guru', [AbsensiGuruController::class, 'rekapBulanan'])->name('rekap.bulanan.guru');


Route::get('/', function () {
    return view('welcome');
});
