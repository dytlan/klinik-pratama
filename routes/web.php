<?php

use App\Models\Pelayanan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('admin');
})->middleware(['auth', 'isAdmin']);

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'isAdmin'], 'namespace' => 'Admin'], function () {
    Route::get('/', 'UserController@dashboard')->name('admin');

    Route::resource('/jadwal', 'JadwalPraktekController');
    Route::resource('/user', 'UserController');
});

/*
|--------------------------------------------------------------------------
| Resepsionis Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/resepsionis', 'middleware' => ['auth', 'isResepsionis'], 'namespace' => 'Resepsionis'], function () {
    Route::get('/', function () {
        return view('pages.resepsionis.dashboard');
    })->name('resepsionis');

    Route::resource('/registrasi/pelayanan', 'PelayananController')->only('index', 'show');
    Route::post('/registrasi/pelayanan/{pelayanan}/pasien', 'RegisterPelayananController@checkPatient')->name('check.patient');
    Route::get('/registrasi/pelayanan/{pelayanan}/create', 'RegisterPelayananController@create')->name('register.pelayanan.create');
    Route::post('/registrasi/pelayanan/{pelayanan}', 'RegisterPelayananController@store')->name('register.pelayanan.store');
    Route::get('/pembayaran', 'AntrianController@antrian')->name('pembayaran.antrian');
    Route::get('/transaksi', 'PembayaranController@index')->name('transaksi.index');
    Route::get('/transaksi/{pelayanan}', 'PembayaranController@show')->name('transaksi.show');
    Route::get('/pembayaran/{pelayanan}', 'PembayaranController@create')->name('pembayaran.invoice');
    Route::get('/pembayaran-confirm/{pelayanan}', 'PembayaranController@store')->name('pembayaran.confirm');
    Route::resource('/pasien', 'PatientController');
});

/*
|--------------------------------------------------------------------------
| Dokter Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/dokter', 'middleware' => ['auth', 'isDokter'], 'namespace' => 'Dokter'], function () {
    Route::get('/', function () {
        return view('pages.dokter.dashboard');
    })->name('dokter');

    Route::get('/antrian', 'AntrianController@antrian')->name('periksa-pasien');
    Route::get('/rekam-medis', 'RekamMedisController@index')->name('rekam.medis.index');
    Route::get('/rekam-medis/{register}', 'RekamMedisController@create')->name('create-rekam-medis');
    Route::post('/rekam-medis/{register}', 'RekamMedisController@store')->name('rekam.medis.store');
});

/*
|--------------------------------------------------------------------------
| Bidan Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => '/bidan', 'middleware' => ['auth', 'isBidan']], function () {
    Route::get('/', function () {
        return view('pages.bidan.dashboard');
    })->name('bidan');
});

/*
|--------------------------------------------------------------------------
| Apoteker Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/apoteker', 'middleware' => ['auth', 'isApoteker'], 'namespace' => 'Apoteker'], function () {
    Route::get('/', function () {
        return view('pages.apoteker.dashboard');
    })->name('apoteker');
    Route::get('/permintaan-resep', 'AntrianController@antrian')->name('permintaan-resep');
    Route::get('/transaksi/obat/{pelayanan}', 'TransaksiObatController@create')->name('transaksi.obat.pasien');
    Route::resource('/obat/kategori', 'KategoriObatController');
    Route::resource('/data-obat', 'ObatController');
});

Auth::routes();
