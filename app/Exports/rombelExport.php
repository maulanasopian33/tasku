<?php

namespace App\Exports;

use App\Models\rombel;
use Maatwebsite\Excel\Concerns\FromCollection;

class rombelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return rombel::all()->map->only('nama','tahun_akademik','id_sekolah');
    }
}
