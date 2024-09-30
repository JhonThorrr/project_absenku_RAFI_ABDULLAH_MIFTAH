<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToAbsensiGurusTable extends Migration
{
    public function up()
    {
        Schema::table('absensi_gurus', function (Blueprint $table) {
            $table->tinyInteger('status')->after('mata_pelajaran')->default(1);
        });
    }

    public function down()
    {
        Schema::table('absensi_gurus', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
