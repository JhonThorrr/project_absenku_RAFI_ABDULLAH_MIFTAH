<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AbsensiSeeder extends Seeder
{
    /**
     * Seed the absensi_siswa table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('absensis')->insert([
            [
                'no_siswa' => 'S001',
                'nama' => 'Ahmad Fauzi',
                'kelas' => '10A',
                'tanggal' => Carbon::now()->subDays(3)->toDateString(),
                'jam_masuk' => '07:30',
                'jam_keluar' => '14:00',
                'status' => 1, // Misalnya 1 untuk 'masuk'
            ],
            [
                'no_siswa' => 'S002',
                'nama' => 'Budi Santoso',
                'kelas' => '10B',
                'tanggal' => Carbon::now()->subDays(2)->toDateString(),
                'jam_masuk' => '07:35',
                'jam_keluar' => '14:05',
                'status' => 1, // Misalnya 1 untuk 'masuk'
            ],
            [
                'no_siswa' => 'S003',
                'nama' => 'Chandra Putra',
                'kelas' => '11A',
                'tanggal' => Carbon::now()->subDays(1)->toDateString(),
                'jam_masuk' => '07:40',
                'jam_keluar' => '14:10',
                'status' => 1, // Misalnya 1 untuk 'masuk'
            ],
            [
                'no_siswa' => 'S004',
                'nama' => 'Dewi Purnama',
                'kelas' => '12A',
                'tanggal' => Carbon::now()->toDateString(), // Menggunakan tanggal hari ini
                'jam_masuk' => '07:45',
                'jam_keluar' => '14:15',
                'status' => 1, // Misalnya 1 untuk 'masuk'
            ],
            [
                'no_siswa' => 'S005', // Data baru dengan tanggal di bulan yang berbeda
                'nama' => 'Eka Wijaya',
                'kelas' => '12B',
                'tanggal' => Carbon::now()->subMonth()->toDateString(), // Menggunakan tanggal bulan lalu
                'jam_masuk' => '08:00',
                'jam_keluar' => '15:00',
                'status' => 1, // Misalnya 1 untuk 'masuk'
            ],
        ]);
    }
}
