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

// DESTINASI
Route::get('destinasi', 'DestinationController@index');
Route::get('destinasi/detail/{slug}', 'DestinationController@show');

// PERALATAN HIKING
Route::get('peralatan', 'HikingController@index')->name('peralatan');

// KERANJANG
Route::resource('keranjang', 'CartController');
Route::get('keranjang/{cartID}/delete', 'CartController@destroy');
Route::post('keranjang/update', 'CartController@update');


Route::get('transaksi', 'OrderController@index');
Route::get('transaksi/{orderID}', 'OrderController@show');

// PEMBAYARAN
Route::post('pembayaran/notifikasi', 'PaymentController@notification');
Route::get('pembayaran/selesai', 'PaymentController@completed');
Route::get('pembayaran/gagal', 'PaymentController@failed');
Route::get('pembayaran/belum-selesai', 'PaymentController@unfinish');

// ADMIN
Route::get('/admin', function () {
    return redirect('/admin/dashboard');
})->middleware('role:admin');

Route::prefix('admin')->namespace('Admin')->middleware('role:admin')->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // ROUTE PERALATAN
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

    // LOKASI
    Route::resource('destinasi/lokasi', 'LocationController');
    Route::get('destinasi/lokasi/{id}/delete', 'LocationController@destroy')->name('admin.lokasi.delete');
    Route::get('destinasi/lokasi/{locationID}/gambar', 'LocationController@images')->name('admin.lokasi.images');
    Route::get('destinasi/lokasi/{locationID}/tambah-gambar', 'LocationController@add_image')->name('admin.lokasi.add_image');
    Route::post('destinasi/lokasi/gambar/{locationID}', 'LocationController@upload_image')->name('admin.lokasi.upload_image');
    Route::delete('destinasi/lokasi/gambar/{imageID}', 'LocationController@remove_image')->name('admin.lokasi.remove_image');

    // TRANSAKSI
    Route::resource('transaksi', 'OrderController');
    Route::get('transaksi/{orderID}/batalkan', 'OrderController@cancel');
    Route::put('transaksi/batalkan/{orderID}', 'OrderController@doCancel');
    Route::post('transaksi/selesai/{orderID}', 'OrderController@doComplete');
});

Route::namespace('Auth')->group(function () {
    Route::get('profil', 'ProfileController@index');
    Route::post('profil', 'ProfileController@update');
});

Route::middleware('auth')->group(function () {
    // ORDER
    Route::get('pesanan/checkout', 'OrderController@checkout');
    Route::post('pesanan/checkout', 'OrderController@doCheckout');
    Route::get('pesanan/diterima/{orderID}', 'OrderController@received');
    Route::get('fetch', 'OrderController@fetch');
});

require __DIR__ . '/auth.php';
