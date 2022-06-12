<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mapel',
        'kelas',
        'nama_guru',
        'id_sekolah',
        'tahun_akademik'
    ];
}
