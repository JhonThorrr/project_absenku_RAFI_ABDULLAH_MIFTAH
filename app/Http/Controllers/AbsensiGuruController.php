<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbsensiGuru; // Pastikan model AbsensiGuru diimpor
use Carbon\Carbon;

class AbsensiGuruController extends Controller
{
    // Menyimpan data absensi guru
    public function store(Request $request)
    {
        $request->validate([
            'no_guru' => 'required|string',
            'nama_guru' => 'required|string',
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable:H:i',
            'jam_keluar' => 'nullable:H:i',
            'mata_pelajaran' => 'required|string',
            'status' => 'required|in:1,2', // Status hanya boleh 1 (masuk) atau 2 (keluar)
        ]);

        $absensiGuru = AbsensiGuru::updateOrCreate(
            [
                'no_guru' => $request->no_guru,
                'status' => 1, // Status untuk jam masuk
            ],
            [
                'nama_guru' => $request->nama_guru,
                'tanggal' => $request->tanggal,
                'jam_masuk' => $request->jam_masuk,
                'jam_keluar' => $request->jam_keluar,
                'mata_pelajaran' => $request->mata_pelajaran,
                'status' => $request->status
            ]
        );

        return response()->json(['success' => true, 'data' => $absensiGuru], 201);
    }

    // Menampilkan daftar absensi guru
    public function index()
    {
        $absensi_gurus = AbsensiGuru::all();
        return view('absensi_guru', ['absensi_gurus' => $absensi_gurus]);
    }

    // Menampilkan rekap bulanan untuk absensi guru
    public function rekapBulanan(Request $request)
    {
        // Jika bulan diberikan melalui query string, gunakan itu, jika tidak, gunakan bulan saat ini
        $bulan = $request->input('bulan', Carbon::now()->format('Y-m'));
        
        // Konversi ke awal dan akhir bulan
        $startDate = Carbon::parse($bulan)->startOfMonth()->toDateString();
        $endDate = Carbon::parse($bulan)->endOfMonth()->toDateString();

        // Ambil data absensi berdasarkan rentang tanggal dalam bulan yang dipilih
        $absensi_gurus = AbsensiGuru::whereBetween('tanggal', [$startDate, $endDate])->get();

        // Kirim data ke view
        return view('rekap_bulanan_guru', compact('absensi_gurus', 'bulan'));
    }
}
