<?php

namespace App\Http\Controllers;


use Excel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;
use App\Imports\PengumumanImport;


class excelController extends Controller implements FromCollection,WithHeadings
{


    public function export()
    {
        return Excel::download($this, 'pengumuman.xlsx');
    }


    public function collection()
    {
        return DB::table("pengumuman")->get(); 
     // Ganti dengan query atau model Anda
    }


    public function headings(): array
    {
        return [
            'NO',
            'NISN',
            'NAMA',
            'KELAS',
            'EKSTRAKULIKULER',
            // Tambahkan kolom sesuai dengan struktur tabel Anda
        ];
    }

    public function pengumumanimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataPengumuman', $namaFile);

        Excel::import(new PengumumanImport, public_path('/DataPengumuman/'.$namaFile));
        return redirect('/pengumuman');
    }
}