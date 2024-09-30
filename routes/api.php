<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AbsensiGuruController;
// Route untuk menyimpan data absensi
Route::post('/absensi', [AbsensiController::class, 'store'])
    ->name('absensi.store');

// Route untuk menampilkan daftar absensi
Route::get('/absensi', [AbsensiController::class, 'index'])
    ->name('absensi.index');

// Route untuk mendapatkan informasi pengguna yang sedang login (opsional jika menggunakan autentikasi)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/absensi-guru', [AbsensiGuruController::class, 'store'])->name('absensi-guru.store');
Route::get('/absensi-guru', [AbsensiGuruController::class, 'index'])->name('absensi-guru.index');

