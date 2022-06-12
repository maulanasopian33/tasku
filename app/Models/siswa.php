<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $fillable =[
      'nama_siswa',
      'jk',
      'kelas',
      'id_sekolah',
      'tahun_akademik'
      ];
}