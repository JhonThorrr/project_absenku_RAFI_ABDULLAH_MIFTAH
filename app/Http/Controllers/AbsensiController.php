<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    // Menyimpan data absensi
    public function store(Request $request)
    {
        $request->validate([
            'no_siswa' => 'required|string',
            'nama' => 'required|string',
            'kelas' => 'required|string',
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'status' => 'required|in:1,2' // Status hanya boleh 1 (masuk) atau 2 (keluar)
        ]);

        // Logika untuk status: 1 = "masuk", 2 = "keluar"
        $status = ($request->status == 1) ? 'masuk' : 'keluar';

        if ($request->status == 1) {
            // Jika status adalah 1 (masuk), update entri yang sudah ada atau buat entri baru
            $absensi = Absensi::where('no_siswa', $request->no_siswa)
                ->where('tanggal', $request->tanggal)
                ->first();

            if ($absensi) {
                // Update jam_masuk jika ada entri untuk siswa pada tanggal yang sama
                $absensi->update([
                    'jam_masuk' => $request->jam_masuk, // Update jam_masuk
                    'status' => $status // Ubah status menjadi 'masuk'
                ]);
            } else {
                // Buat entri baru jika tidak ada entri untuk siswa pada tanggal yang sama
                $absensi = Absensi::create([
                    'no_siswa' => $request->no_siswa,
                    'nama' => $request->nama,
                    'kelas' => $request->kelas,
                    'tanggal' => $request->tanggal,
                    'jam_masuk' => $request->jam_masuk,
                    'jam_keluar' => null, // Jam keluar tidak diatur saat status 1
                    'status' => $status
                ]);
            }
        } else if ($request->status == 2) {
            // Jika status adalah 2 (keluar), update entri yang sudah ada
            $absensi = Absensi::where('no_siswa', $request->no_siswa)
                ->where('tanggal', $request->tanggal)
                ->first();

            if ($absensi) {
                // Update jam_keluar tanpa menghapus jam_masuk
                $absensi->update([
                    'jam_keluar' => $request->jam_keluar, // Update jam_keluar
                    'status' => $status // Ubah status menjadi 'keluar'
                ]);
            } else {
                // Jika tidak ada entri yang cocok, buat entri baru dengan jam keluar
                $absensi = Absensi::create([
                    'no_siswa' => $request->no_siswa,
                    'nama' => $request->nama,
                    'kelas' => $request->kelas,
                    'tanggal' => $request->tanggal,
                    'jam_masuk' => null, // Jam masuk tidak diatur saat status 2
                    'jam_keluar' => $request->jam_keluar,
                    'status' => $status
                ]);
            }
        }

        return response()->json(['success' => true, 'data' => $absensi], 201);
    }

    // Menampilkan daftar absensi di tampilan web
    public function index()
    {
        $absensi = Absensi::all();
        return view('absensi', ['absensi' => $absensi]);
    }

    // Method untuk menampilkan rekap bulanan
    public function rekapBulanan(Request $request)
    {
        // Jika bulan diberikan melalui query string, gunakan itu, jika tidak, gunakan bulan saat ini
        $bulan = $request->input('bulan', Carbon::now()->format('Y-m'));
        
        // Konversi ke awal dan akhir bulan
        $startDate = Carbon::parse($bulan)->startOfMonth()->toDateString();
        $endDate = Carbon::parse($bulan)->endOfMonth()->toDateString();

        // Ambil data absensi berdasarkan rentang tanggal dalam bulan yang dipilih
        $absensi = Absensi::whereBetween('tanggal', [$startDate, $endDate])->get();

        // Kirim data ke view
        return view('rekap_bulanan', compact('absensi', 'bulan'));
    }
}
