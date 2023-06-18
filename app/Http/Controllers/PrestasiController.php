<?php

namespace App\Http\Controllers;
use App\Models\Prestasi;
use App\Models\Ekstra;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $data['prestasi'] = Prestasi::whereHas('ekstra', function ($query) use ($search){
                                        $query->where('nama_ekstra', 'LIKE', '%'.$search.'%');
                                    })
                                    ->paginate(5);
        return view('Prestasi', $data);
        
    }
    public function showDataPrestasi(Request $request)
    {
        $search = $request->search;
        $data['prestasi'] = Prestasi::whereHas('ekstra', function ($query) use ($search){
                                        $query->where('nama_ekstra', 'LIKE', '%'.$search.'%');
                                    })
                                    ->paginate(15);
        return view('userPrestasi', $data);
    }
    public function create()
    {
        $ekstra = Ekstra::select('id_ekstra', 'nama_ekstra')->get();
        return view('tambahprestasi', ['ekstra'=> $ekstra]);
    }

    public function store(Request $request)
    {
        $lombaInput = $request->input('lombaInput');
        $juaraInput = $request->input('juaraInput');
        $ekstraInput = $request->input('ekstraInput');
        $tanggalInput = $request->input('tanggalInput');
        

        // dd($request->input(''));

        $query = DB::table('prestasi')->insert([
            'lomba' => $lombaInput,
            'juara' => $juaraInput,
            'id_ekstra' => $ekstraInput,
            'tanggal' => $tanggalInput,
            
        ]);

        if ($query) {
            return redirect()->route('prestasi')->route('siswa')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('prestasi')->with('failed', 'Data gagal ditambahkan');
        }

    }
    public function edit($id)
    {
        $decrypted_id = decrypt($id);
        $data['prestasi'] = DB::table('prestasi')->where('id_prestasi', $decrypted_id)->first();
        $data['ekstra'] = Ekstra::select('id_ekstra', 'nama_ekstra')->get();
        return view('editprestasi', $data);

    }
    public function update(Request $request, $id)
    {
        $lombaInput = $request->input('lombaInput');
        $juaraInput = $request->input('juaraInput');
        $ekstraInput = $request->input('ekstraInput');
        $tanggalInput = $request->input('tanggalInput');

        $query = DB::table('prestasi')->where('id_prestasi', $id)->update([
            'lomba' => $lombaInput,
            'juara' => $juaraInput,
            'id_ekstra' => $ekstraInput,
            'tanggal' => $tanggalInput,
        ]);

        if ($query) {
            return redirect()->route('prestasi')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('prestasi')->with('failed', 'Data gagal diupdate');
        }

    }

    public function destroy($id)
    {
        $query = DB::table('prestasi')->where('id_prestasi', $id)->delete();

        if ($query) {
            return redirect()->route('prestasi')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('prestasi')->with('failed', 'Data gagal dihapus');
        }

    }

}
