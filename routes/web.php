<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
})->middleware('auth');

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // ROUTE PERALATAN
    Route::resource('peralatan/kategori', 'KategoriController');
    Route::resource('peralatan/alat', 'AlatController');

    // ROUTE DESTINASI
    Route::resource('destinasi/provinsi', 'ProvinsiController');
    Route::resource('destinasi/wisata', 'WisataController');
    Route::resource('destinasi/lokasi', 'LokasiController');
});

require __DIR__ . '/auth.php';
