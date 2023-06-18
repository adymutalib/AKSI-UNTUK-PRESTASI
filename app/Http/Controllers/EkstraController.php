<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Ekstra;
use App\Models\Pembina;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EkstraController extends Controller
{
    public function index(Request $request)
    {
        $ekstra = $request->ekstra;
        $data['ekstra'] = Ekstra::where('nama_ekstra', 'LIKE', '%'.$ekstra.'%')
                                ->paginate(4);
        return view('ekstra', $data);
        
    }

    public function create()
    {
        $pembina = Pembina::select('id_pembina', 'nama')->get();
        return view('tambahEkstra', ['pembina' => $pembina]);
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'ekstraInput' => 'required',
            'deskInput' => 'required',
            'pembinaInput' => 'required',
            'image' => 'required|image|mimes:png,jpg'
        ]);

        if($request->file('image')){
            $validatedData['image']=$request->file('image')->store('public/app/image');
        }
        
        $ekstraInput = $request->input('ekstraInput');
        $deskInput = $request->input('deskInput');
        $pembinaInput = $request->input('pembinaInput');
        $image = $request->file('image')->store('image');

        $query = DB::table('ekstra')->insert([
            'nama_ekstra' => $ekstraInput,
            'penjelasan' => $deskInput,
            'id_pembina' => $pembinaInput,
            'image' => $image
        ]);

        if ($query) {
            return redirect()->route('ekstra')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('ekstra')->with('failed', 'Data gagal ditambahkan');
        }

    }
    public function edit($id)
    {
        $decrypted_id = decrypt($id);
        $data['ekstra'] = DB::table('ekstra')->where('id_ekstra', $decrypted_id)->first();
        $data['pembina'] = Pembina::select('id_pembina', 'nama')->get();
        return view('editEkstra', $data);

    }

    public function update(Request $request, $id)
    {
         $rules = [
            'ekstraInput' => 'required',
            'deskInput' => 'required',
            'pembinaInput' => 'required',
            'image' => 'required|image|mimes:png,jpg'
         ];
        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image']=$request->file('image')->store('public/app/image');
        }

        $ekstraInput = $request->input('ekstraInput');
        $deskInput = $request->input('deskInput');
        $pembinaInput = $request->input('pembinaInput');
        $image = $request->file('image')->store('image');

        $query = DB::table('ekstra')->where('id_ekstra', $id)->update([
            'nama_ekstra' => $ekstraInput,
            'penjelasan' => $deskInput,
            'id_pembina' => $pembinaInput,
            'image' => $image
        ]);
        if ($query) {
            return redirect()->route('ekstra')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('ekstra')->with('failed', 'Data gagal diupdate');
        }

    }

    public function destroy($id)
    {
        $query = DB::table('ekstra')->where('id_ekstra', $id)->delete();

        if ($query) {
            return redirect()->route('ekstra')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('ekstra')->with('failed', 'Data gagal dihapus');
        }

    }


}
