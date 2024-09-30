<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absensi_gurus', function (Blueprint $table) {
            $table->date('tanggal')->after('nama_guru'); // Menambahkan kolom tanggal setelah nama_guru
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absensi_gurus', function (Blueprint $table) {
            $table->dropColumn('tanggal');
        });
    }
};
