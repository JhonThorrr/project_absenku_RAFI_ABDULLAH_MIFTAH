<?php
use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiGuruController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route untuk menampilkan daftar absensi di tampilan web
Route::get('/absensi', [AbsensiController::class, 'index'])
    ->name('absensi.index');
    
Route::get('/', function () {
    return view('welcome');
});

Route::get('/absensi-guru', [AbsensiGuruController::class, 'index'])->name('absensi-guru.index');
Route::post('/absensi-guru', [AbsensiGuruController::class, 'store'])->name('absensi-guru.store');
Route::get('/rekap-bulanan', [AbsensiController::class, 'rekapBulanan'])->name('rekap.bulanan');





