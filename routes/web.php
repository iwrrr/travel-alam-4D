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
    // KATEGORI
    Route::resource('peralatan/kategori', 'CategoryController');
    // ALAT
    Route::resource('peralatan/alat', 'ToolController');

    // ROUTE DESTINASI
    // PROVINSI
    Route::resource('destinasi/provinsi', 'ProvinceController');
    Route::get('destinasi/provinsi/delete/{id}', 'ProvinceController@destroy')->name('admin.provinsi.delete');

    // WISATA
    Route::resource('destinasi/wisata', 'TourController');
    Route::get('destinasi/wisata/delete/{id}', 'TourController@destroy')->name('admin.wisata.delete');

    // LOKASI
    Route::resource('destinasi/lokasi', 'LocationController');
    Route::get('destinasi/lokasi/delete/{id}', 'LocationController@destroy')->name('admin.lokasi.delete');
});

require __DIR__ . '/auth.php';
