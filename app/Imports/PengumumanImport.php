<?php

namespace App\Imports;

use App\Models\Pengumuman;
use Maatwebsite\Excel\Concerns\ToModel;

class PengumumanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pengumuman([
            'NO' => $row[0],
            'NISN' => $row[1],
            'NAMA' => $row[2],
            'KELAS' => $row[3],
            'EKSTRAKULIKULER' => $row[4], 
        ]);
    }
}