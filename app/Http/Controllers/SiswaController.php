<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Ekstra;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $nama = $request->nama;
        $data['siswa'] = Siswa::where('nama', 'LIKE', '%'.$nama.'%')
                                ->orWhereHas('ekstra', function ($query) use ($nama) {
                                    $query->where('nama_ekstra', 'LIKE', '%'.$nama.'%');
                                })
                                ->paginate(7);
                                Session::put('filtered_siswa', $data['siswa']);
        return view('siswa', $data);
        
    }

    public function create()
    {
        $ekstra = Ekstra::select('id_ekstra', 'nama_ekstra')->get();
        return view('tambahSiswa', ['ekstra'=> $ekstra]);
    }

    public function store(Request $request)
    {
        $namaInput = $request->input('namaInput');
        $nisInput = $request->input('nisInput');
        $kelasInput = $request->input('kelasInput');
        $jabatanInput = $request->input('jabatanInput');
        $ekstraInput = $request->input('ekstraInput') ;
        

        // dd($request->input(''));

        $query = DB::table('siswa')->insert([
            'nama' => $namaInput,
            'nis' => $nisInput,
            'kelas' => $kelasInput,
            'jabatan' => $jabatanInput,
            'id_ekstra' => $ekstraInput,
            
        ]);

        if ($query) {
            return redirect()->route('siswa')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('siswa')->with('failed', 'Data gagal ditambahkan');
        }

    }

    public function edit($id)
    {
        $decrypted_id = decrypt($id);
        $data['siswa'] = DB::table('siswa')->where('id_siswa', $decrypted_id)->first();
        $data['ekstra'] = Ekstra::select('id_ekstra', 'nama_ekstra')->get();
        return view('editSiswa', $data);

    }
    public function update(Request $request, $id)
    {
        $namaInput = $request->input('namaInput');
        $nisInput = $request->input('nisInput');
        $kelasInput = $request->input('kelasInput');
        $jabatanInput = $request->input('jabatanInput');
        $ekstraInput = $request->input('ekstraInput');

        $query = DB::table('siswa')->where('id_siswa', $id)->update([
            'nama' => $namaInput,
            'nis' => $nisInput,
            'kelas' => $kelasInput,
            'jabatan' => $jabatanInput,
            'id_ekstra' => $ekstraInput,
        ]);

        if ($query) {
            return redirect()->route('siswa')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('siswa')->with('failed', 'Data gagal diupdate');
        }

    }
  

    public function destroy($id)
    {
        $query = DB::table('siswa')->where('id_siswa', $id)->delete();

        if ($query) {
            return redirect()->route('siswa')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('siswa')->with('failed', 'Data gagal dihapus');
        }

    }
    public function exportPDF(Request $request)
    {
        $data = Session::get('filtered_siswa');
        $pdf = PDF::loadView('export', compact ('data'));
        return $pdf->download('data_siswa.pdf');
    }


}
