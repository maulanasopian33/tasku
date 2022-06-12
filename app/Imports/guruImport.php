<?php

namespace App\Imports;

use App\Models\guru;
use Maatwebsite\Excel\Concerns\ToModel;

class guruImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new guru([
            'Nama_guru' => $row['1'],
            'Jk' => $row['2'],
            'Jabatan' => $row['3'],
            
        ]);
    }
}
