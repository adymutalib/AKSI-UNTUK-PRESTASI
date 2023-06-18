<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\EkstraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\excelController;
use App\Http\Controllers\excelPendaftarController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/pendaftaran/create', [PendaftarController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran', [PendaftarController::class, 'store'])->name('pendaftaran.store');
Route::get('/chart', [PendaftarController::class, 'chart'])->name('chart');
Route::get('/userPengumuman', [PengumumanController::class, 'showDataPengumuman'])->name('userPengumuman');
Route::get('/userPrestasi', [PrestasiController::class, 'showDataPrestasi'])->name('userPrestasi');

// Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
// Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/data-pengguna',[DashboardController::class,'showDataPengguna'])->name('dashboard.showDataPengguna')->middleware('admin');
    Route::resource('dashboard', DashboardController::class) ->name('*', 'dashboard');
    Route::resource('siswa', SiswaController::class) ->name('index', 'siswa');
    Route::resource('prestasi', PrestasiController::class) ->name('index', 'prestasi');
    Route::get('/pendaftaran', [PendaftarController::class, 'index'])->name('pendaftaran.index');
    Route::get('/pendaftaran/{id}/edit', [PendaftarController::class, 'edit'])->name('pendaftaran.edit');
    Route::put('/pendaftaran/{id}', [PendaftarController::class, 'update'])->name('pendaftaran.update');
    Route::delete('/pendaftaran/{id}', [PendaftarController::class, 'destroy'])->name('pendaftaran.destroy');
    Route::resource('pembina', PembinaController::class) ->name('index', 'pembina');
    Route::resource('ekstra', EkstraController::class) ->name('index', 'ekstra');
    Route::resource('pengumuman', PengumumanController::class) ->name('index', 'pengumuman');
    Route::get("export/excel",[excelPendaftarController::class,'export'])->name('export.excel');
    Route::post("import/excel",[excelController::class,'pengumumanimportexcel'])->name('import.excel');
    Route::get('/siswa-pdf',[SiswaController::class,'exportPDF'])->name('export.pdf');
    
});






