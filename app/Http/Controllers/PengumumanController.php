<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Exports\PengumumanExport;
use App\Imports\PengumumanImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $data['pengumuman'] = Pengumuman::where('NAMA', 'LIKE', '%'.$search.'%')
                                        ->orWhere('EKSTRAKULIKULER', 'LIKE', '%'.$search.'%')
                                        ->orWhere('NISN', 'LIKE', '%'.$search.'%')
                                        ->orWhere('KELAS', 'LIKE', '%'.$search.'%')
                                        ->paginate(8);
        return view('pengumuman', $data);

    }
    public function showDataPengumuman(Request $request)
    {
        $search = $request->search;
        $data['pengumuman'] = Pengumuman::where('NAMA', 'LIKE', '%'.$search.'%')
                                        ->orWhere('EKSTRAKULIKULER', 'LIKE', '%'.$search.'%')
                                        ->orWhere('NISN', 'LIKE', '%'.$search.'%')
                                        ->orWhere('KELAS', 'LIKE', '%'.$search.'%')
                                        ->paginate(15);
        return view('userPengumuman', $data);

    }
    public function edit($NISN)
    {
        $data['pengumuman'] = DB::table('pengumuman')->where('NISN', $NISN)->first();
        return view('editPengumuman', $data);

    }

    public function update(Request $request, $NISN)
    {
        $namaInput = $request->input('namaInput');
        $nisnInput = $request->input('nisnInput');
        $kelasInput = $request->input('kelasInput');
        $ekstraInput = $request->input('ekstraInput');

        $query = DB::table('pengumuman')->where('NISN', $NISN)->update([
            'NAMA' => $namaInput,
            'NISN' => $nisnInput,
            'KELAS' => $kelasInput,
            'EKSTRAKULIKULER' => $ekstraInput,
        ]);

        if ($query) {
            return redirect()->route('pengumuman')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('pengumuman')->with('failed', 'Data gagal diupdate');
        }

    }

    public function destroy($NISN)
    {
        $query = DB::table('pengumuman')->where('NISN', $NISN)->delete();

        if ($query) {
            return redirect()->route('pengumuman')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('pengumuman')->with('failed', 'Data gagal dihapus');
        }

    }


}