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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
})->middleware('role:admin');

Route::prefix('admin')->namespace('Admin')->middleware('role:admin')->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // ROUTE PERALATAN
    // KATEGORI
    Route::resource('peralatan/kategori', 'CategoryController');
    Route::get('peralatan/kategori/{id}/delete', 'CategoryController@destroy')->name('admin.kategori.delete');

    // ALAT
    Route::resource('peralatan/alat', 'ToolController');
    Route::get('peralatan/alat/{id}/delete', 'ToolController@destroy')->name('admin.alat.delete');
    Route::get('peralatan/alat/{toolID}/gambar', 'ToolController@images')->name('admin.alat.images');
    Route::get('peralatan/alat/{toolID}/tambah-gambar', 'ToolController@add_image')->name('admin.alat.add_image');
    Route::post('peralatan/alat/gambar/{toolID}', 'ToolController@upload_image')->name('admin.alat.upload_image');
    Route::delete('peralatan/alat/gambar/{imageID}', 'ToolController@remove_image')->name('admin.alat.remove_image');

    // ROUTE DESTINASI
    // PROVINSI
    Route::resource('destinasi/provinsi', 'ProvinceController');
    Route::get('destinasi/provinsi/{id}/delete', 'ProvinceController@destroy')->name('admin.provinsi.delete');

    // WISATA
    Route::resource('destinasi/wisata', 'TourController');
    Route::get('destinasi/wisata/{id}/delete', 'TourController@destroy')->name('admin.wisata.delete');

    // LOKASI
    Route::resource('destinasi/lokasi', 'LocationController');
    Route::get('destinasi/lokasi/{id}/delete', 'LocationController@destroy')->name('admin.lokasi.delete');
    Route::get('destinasi/lokasi/{locationID}/gambar', 'LocationController@images')->name('admin.lokasi.images');
    Route::get('destinasi/lokasi/{locationID}/tambah-gambar', 'LocationController@add_image')->name('admin.lokasi.add_image');
    Route::post('destinasi/lokasi/gambar/{locationID}', 'LocationController@upload_image')->name('admin.lokasi.upload_image');
    Route::delete('destinasi/lokasi/gambar/{imageID}', 'LocationController@remove_image')->name('admin.lokasi.remove_image');
});

Route::middleware('auth')->group(function () {
    // PERALATAN HIKING
    Route::get('peralatan-hiking', 'HikingController@index')->name('peralatan-hiking');

    // PERALATAN SURFING
    Route::get('peralatan-surfing', 'SurfingController@index')->name('peralatan-surfing');

    // KERANJANG
    Route::resource('keranjang', 'CartController');
    Route::get('keranjang/{cartID}/delete', 'CartController@destroy');
    Route::get('keranjang/update', 'CartController@update');
});

require __DIR__ . '/auth.php';
