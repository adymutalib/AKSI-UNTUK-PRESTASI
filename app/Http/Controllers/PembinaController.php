<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Pembina;
use App\Models\Ekstra;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PembinaController extends Controller
{
    public function index(Request $request)
    {
        $nama = $request->nama;
        $data['pembina'] = Pembina::where('nama', 'LIKE', '%'.$nama.'%')
                                ->paginate(7);
        return view('pembina', $data);
        
    }
    public function create()
    {
        // $ekstra = Ekstra::select('id_ekstra', 'nama_ekstra')->get();
        return view('tambahPembina');
    }

    public function store(Request $request)
    {
        $namaInput = $request->input('namaInput');
        $nipInput = $request->input('nipInput');
        $jkInput = $request->input('jkInput');
        $ttlInput = $request->input('ttlInput');
        $nohpInput = $request->input('nohpInput');
        
        // dd($request->input(''));

        $query = DB::table('pembina')->insert([
            'nama' => $namaInput,
            'nip' => $nipInput,
            'jenis_kelamin' => $jkInput,
            'ttl' => $ttlInput,
            'no_telp' => $nohpInput
            
        ]);

        if ($query) {
            return redirect()->route('pembina')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('pembina')->with('failed', 'Data gagal ditambahkan');
        }

    }
    public function edit($id)
    {
        $decrypted_id = decrypt($id);
        $data['pembina'] = DB::table('pembina')->where('id_pembina', $decrypted_id)->first();
        // $data['ekstra'] = Ekstra::select('id_ekstra', 'nama_ekstra')->get();
        return view('editPembina', $data);

    }
    public function update(Request $request, $id)
    {
        $namaInput = $request->input('namaInput');
        $nipInput = $request->input('nipInput');
        $jkInput = $request->input('jkInput');
        $ttlInput = $request->input('ttlInput');
        $nohpInput = $request->input('nohpInput');
        

        $query = DB::table('pembina')->where('id_pembina', $id)->update([
            'nama' => $namaInput,
            'nip' => $nipInput,
            'jenis_kelamin' => $jkInput,
            'ttl' => $ttlInput,
            'no_telp' => $nohpInput
        ]);

        if ($query) {
            return redirect()->route('pembina')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('pembina')->with('failed', 'Data gagal diupdate');
        }

    }

    public function destroy($id)
    {
        $query = DB::table('pembina')->where('id_pembina', $id)->delete();

        if ($query) {
            return redirect()->route('pembina')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('pembina')->with('failed', 'Data gagal dihapus');
        }

    }

}
