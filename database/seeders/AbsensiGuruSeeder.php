<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsensiGuruSeeder extends Seeder
{
    /**
     * Seed the absensi_gurus table.
     *
     * @return void
     */
    public function run()
    {
        DB::table('absensi_gurus')->insert([
            [
                'no_guru' => 'G001',
                'nama_guru' => 'Andi Setiawan',
                'tanggal' => '2024-09-07',
                'jam_masuk' => '08:00',
                'jam_keluar' => '15:00',
                'mata_pelajaran' => 'Matematika',
                'status' => 1,
            ],
            [
                'no_guru' => 'G002',
                'nama_guru' => 'Budi Santoso',
                'tanggal' => '2024-09-07',
                'jam_masuk' => '07:30',
                'jam_keluar' => '14:00',
                'mata_pelajaran' => 'Bahasa Inggris',
                'status' => 2,
            ],
    
        ]);
    }
}
