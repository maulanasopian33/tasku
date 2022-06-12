<?php

namespace App\Exports;

use App\Models\guru;
use Maatwebsite\Excel\Concerns\FromCollection;

class guruExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return guru::all();
    }
}
