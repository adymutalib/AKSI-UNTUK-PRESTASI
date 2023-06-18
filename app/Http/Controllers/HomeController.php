<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstra;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\EkstraController;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = "Pusat Informasi Ekstrkurikuler";
        $data['ekstra'] = Ekstra::all();
        $data['pendaftaran'] = Pendaftaran::all();

        return view('index', $data);
    }

}
