<?php

namespace App\Imports;

use App\Models\Kamar;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class KamarImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kamar([
            'id_pasien'    => $row[0],
            'id_dokter'    => $row[1],
        ]);
    }
}