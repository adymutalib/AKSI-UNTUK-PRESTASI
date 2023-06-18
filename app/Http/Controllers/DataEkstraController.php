<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DataEkstraController extends Controller
{
    public function index()
    {
        $data['ekstra'] = Ekstra::all();
        return view('ekstra', $data);
        
    }

    public function create()
    {
        return view('tambahPendaftar');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'namaInput' => 'required',
            'nisInput' => 'required',
            'jkInput' => 'required',
            'ttlInput' => 'required', 
            'kelasInput' => 'required',
            'ekstraInput' => 'required',
            'alasanInput' => 'required',
            'image' => 'required|image|mimes:png,jpg'
        ]);

        if($request->file('image')){
            $validatedData['image']=$request->file('image')->store('public/app/image');
        }
        
        $namaInput = $request->input('namaInput');
        $nisInput = $request->input('nisInput');
        $jkInput = $request->input('jkInput');
        $ttlInput = $request->input('ttlInput');
        $kelasInput = $request->input('kelasInput');
        $ekstraInput = $request->input('ekstraInput');
        $alasanInput = $request->input('alasanInput');
        $image = $request->file('image')->store('image');

        $query = DB::table('ekstra')->insert([
            'nama' => $namaInput,
            'nis' => $nisInput,
            'jenis_kelamin' => $jkInput,
            'ttl' => $ttlInput, 
            'kelas' => $kelasInput,
            'ekstra' => $ekstraInput,
            'alasan' => $alasanInput,
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
        $data['ekstra'] = DB::table('ekstra')->where('id', $id)->first();
        return view('editPendaftar', $data);

    }

    public function update(Request $request, $id)
    {
         $rules = [
            'namaInput' => 'required',
            'nisInput' => 'required',
            'jkInput' => 'required',
            'ttlInput' => 'required', 
            'kelasInput' => 'required',
            'ekstraInput' => 'required',
            'alasanInput' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg'
         ];
        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image']=$request->file('image')->store('public/app/image');
        }

        $namaInput = $request->input('namaInput');
        $nisInput = $request->input('nisInput');
        $jkInput = $request->input('jkInput');
        $ttlInput = $request->input('ttlInput');
        $kelasInput = $request->input('kelasInput');
        $ekstraInput = $request->input('ekstraInput');
        $alasanInput = $request->input('alasanInput');
        $image = $request->file('image')->store('image');

        $query = DB::table('ekstra')->where('id', $id)->update([
            'nama' => $namaInput,
            'nis' => $nisInput,
            'jenis_kelamin' => $jkInput,
            'ttl' => $ttlInput,
            'kelas' => $kelasInput,
            'ekstra' => $ekstraInput,
            'alasan' => $alasanInput,
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
        $query = DB::table('ekstra')->where('id', $id)->delete();

        if ($query) {
            return redirect()->route('ekstra')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('ekstra')->with('failed', 'Data gagal dihapus');
        }

    }


}
