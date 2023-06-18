<?php

namespace App\Http\Controllers;


use Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PendaftarController;
use App\Models\Pendaftaran;
use App\Models\Ekstra;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;



class excelPendaftarController extends Controller implements FromCollection,WithHeadings
{


    public function export()
    {
        return Excel::download($this, 'pendaftar.xlsx');
    }


    public function collection()
    {
         return Pendaftaran::join('ekstra', 'pendaftaran.id_ekstra', '=', 'ekstra.id_ekstra')
            ->select('pendaftaran.nama', 'pendaftaran.nis', 'pendaftaran.jenis_kelamin', 'pendaftaran.ttl', 'pendaftaran.kelas', 'ekstra.nama_ekstra', 'pendaftaran.alasan')
            ->get();
    }


    public function headings(): array
    {
        return [
            'nama',
            'nis',
            'jenis_kelamin',
            'ttl',
            'kelas',
            'nama_ekstra',
            'alasan',
            // Tambahkan kolom sesuai dengan struktur tabel Anda
        ];
    }

}