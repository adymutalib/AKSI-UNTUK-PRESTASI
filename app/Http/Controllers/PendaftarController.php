<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Pendaftaran;
use App\Models\Ekstra;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PendaftarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $data['pendaftaran'] = Pendaftaran:: where('nama', 'LIKE', '%' .$search.'%')
                                        ->orWhere('kelas', 'LIKE', '%'.$search.'%')
                                        ->orWhere('jenis_kelamin', 'LIKE', '%'.$search.'%')
                                        ->orWhereHas('ekstra', function ($query) use ($search) {
                                            $query->where('nama_ekstra', 'LIKE', '%'.$search.'%');})
                                        ->paginate(2);
        return view('pendaftar', $data);
        
    }
    public function chart()
    {
        $pendaftaran = Pendaftaran::with('ekstra')->get();
        return view('chart', compact('pendaftaran'));
    }

    public function create()
    {
        $ekstra = Ekstra::select('id_ekstra', 'nama_ekstra')->get();
        return view('pendaftaran', ['ekstra'=> $ekstra]);
    }
    public function store(Request $request)
{
    // Validasi data
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
    // Cek apakah data sudah terdaftar
    $existingData = Pendaftaran::where('nis', $request->input('nisInput'))->first();
    if ($existingData) {
        return redirect()->route('pendaftaran.create')->with('success', 'Anda Tidak dapat melakukan Pendaftaran, Data Telah Terdaftar');
    }

    // Simpan data ke dalam database
    $pendaftaran = new Pendaftaran();
    $pendaftaran->nama = $request->input('namaInput');
    $pendaftaran->nis = $request->input('nisInput');
    $pendaftaran->jenis_kelamin = $request->input('jkInput');
    $pendaftaran->ttl = $request->input('ttlInput');
    $pendaftaran->kelas = $request->input('kelasInput');
    $pendaftaran->id_ekstra = $request->input('ekstraInput');
    $pendaftaran->alasan = $request->input('alasanInput');
    // $pendaftaran->image = $request->file('image')->store('image');
    
    if ($request->file('image')) {
        $pendaftaran->image = $request->file('image')->store('image');
    }

    $pendaftaran->save();

    return redirect()->route('pendaftaran.create')->with('success', 'Data berhasil ditambahkan');
}

    public function edit($id)
    {
        $data['pendaftaran'] = DB::table('pendaftaran')->where('id', $id)->first();
        $data['ekstra'] = Ekstra::select('id_ekstra', 'nama_ekstra')->get();
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

        $query = DB::table('pendaftaran')->where('id', $id)->update([
            'nama' => $namaInput,
            'nis' => $nisInput,
            'jenis_kelamin' => $jkInput,
            'ttl' => $ttlInput,
            'kelas' => $kelasInput,
            'id_ekstra' => $ekstraInput,
            'alasan' => $alasanInput,
            'image' => $image
        ]);
        if ($query) {
            return redirect()->route('pendaftaran.index')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('pendaftaran.index')->with('failed', 'Data gagal diupdate');
        }

    }

    public function destroy($id)
    {
        $query = DB::table('pendaftaran')->where('id', $id)->delete();

        if ($query) {
            return redirect()->route('pendaftaran.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('pendaftaran.index')->with('failed', 'Data gagal dihapus');
        }

    }


}
