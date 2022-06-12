<?php

namespace App\Imports;

use App\Models\rombel;
use Maatwebsite\Excel\Concerns\ToModel;

class rombelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new rombel([
            'nama' => $row[0],
            
        ]);
    }
}
