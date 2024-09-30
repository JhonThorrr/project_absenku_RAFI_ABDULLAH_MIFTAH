<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Menjalankan AbsensiSeeder
        $this->call(AbsensiSeeder::class);

        // Menjalankan AbsensiGuruSeeder
        $this->call(AbsensiGuruSeeder::class);
    }
}
