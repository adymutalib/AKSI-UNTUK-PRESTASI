<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orderController;

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
//     return view('sidebare');
// });

//sidebare
Route::get('/', [orderController::class, 'index']);
//order
Route::get('/order', function () {
    return view('orders');
});
//navbar
Route::get('/nav', function () {
    return view('navbar');
});
//home
Route::get('/home', function () {
    return view('home');
});
//ekstra pembina
Route::get('/pembina', function () {
    return view('data_pembina');
});
//ekstra prestasi
Route::get('/prestasi', function () {
    return view('data_prestasi');
});


