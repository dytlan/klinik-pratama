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
    Route::get('/', function () {
        return view('pages.admin.dashboard');
    })->name('admin');

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
    Route::get('/registrasi/pelayanan/{pelayanan}/create', 'RegisterPelayananController@create')->name('register.pelayanan.create');
    Route::post('/registrasi/pelayanan/{pelayanan}', 'RegisterPelayananController@store')->name('register.pelayanan.store');

    Route::resource('/pasien', 'PatientController');
});

/*
|--------------------------------------------------------------------------
| Dokter Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/dokter', 'middleware' => ['auth', 'isDokter']], function () {
    Route::get('/', function () {
        return view('pages.dokter.dashboard');
    })->name('dokter');
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
Route::group(['prefix' => '/apoteker', 'middleware' => ['auth', 'isApoteker']], function () {
    Route::get('/', function () {
        return view('pages.apoteker.dashboard');
    })->name('apoteker');

    Route::resource('/obat/kategori', 'Apoteker\KategoriObatController');
    Route::resource('/data-obat', 'Apoteker\ObatController');
});

Auth::routes();
