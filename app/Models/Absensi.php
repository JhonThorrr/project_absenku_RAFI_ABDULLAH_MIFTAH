<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = ['no_siswa','nama', 'kelas', 'tanggal', 'jam_masuk', 'jam_keluar','status'];
}
