<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rombel extends Model
{

    use HasFactory;
    protected $fillable = [
        'nama',
        'id_sekolah',
        'tahun_akademik'
      ];
}
