<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Ekstra;
use App\Models\Prestasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSiswa = Siswa::count();
        $jumlahEkstra = Ekstra::count();
        $jumlahPrestasi = Prestasi::count();
        return view('dashboard', [
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahEkstra' => $jumlahEkstra,
            'jumlahPrestasi' => $jumlahPrestasi
        ]);
        // return view('dashboard');
    }

    public function showDataPengguna(Request $request)
    {
        $search = $request->search;
        $data['users'] = User::where('name', 'LIKE', '%'.$search.'%')
                            ->paginate(7);

        return view('data_pengguna',$data);
    }

    public function create()
    {
        return view('tambahUser');
    }

    public function store(Request $request)
    {
        $namaInput = $request->input('namaInput');
        $emailInput = $request->input('emailInput');
        $passwordInput = Hash::make($request->input('passwordInput')) ;
        $is_adminInput = $request->input('is_adminInput');

        // dd($request->input(''));

        $query = DB::table('users')->insert([
            'name' => $namaInput,
            'email' => $emailInput,
            'password' => $passwordInput,
            'is_admin' => $is_adminInput,
        ]);

        if ($query) {
            return redirect()->route('dashboard.showDataPengguna')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('dashboard.showDataPengguna')->with('failed', 'Data gagal ditambahkan');
        }

    }

    public function edit($id)
    {

        $decrypted_id = decrypt($id);
        $data['users'] = DB::table('users')->where('id', $decrypted_id)->first();
        return view('editUser', $data);

    }

    public function update(Request $request, $id)
    {
        $namaInput = $request->input('namaInput');
        $emailInput = $request->input('emailInput');
        $passwordInput = Hash::make($request->input('passwordInput'));
        $is_adminInput = $request->input('is_adminInput');

        $query = DB::table('users')->where('id', $id)->update([
            'name' => $namaInput,
            'email' => $emailInput,
            'password' => $passwordInput,
            'is_admin' => $is_adminInput
        ]);

        if ($query) {
            return redirect()->route('dashboard.showDataPengguna')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('dashboard.showDataPengguna')->with('failed', 'Data gagal diupdate');
        }

    }

    public function destroy($id)
    {
        
        $query = DB::table('users')->where('id', $id)->delete();

        if ($query) {
            return redirect()->route('dashboard.showDataPengguna')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('dashboard.showDataPengguna')->with('failed', 'Data berhasil dihapus');
        }

    }



}
