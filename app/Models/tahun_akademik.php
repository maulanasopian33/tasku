<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class tahun_akademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sekolah',
        'tahun_akademik',
        'id_tahunakademik'
    ];

    static function get($idsekolah){

        return tahun_akademik::all()->sortDesc()->firstwhere('id_sekolah',$idsekolah);

    }
}
