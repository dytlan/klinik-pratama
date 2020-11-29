<?php

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
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/', function () {
        return view('pages.admin.dashboard');
    })->name('admin');

    Route::resource('/user', 'Admin\UserController');
});

/*
|--------------------------------------------------------------------------
| Resepsionis Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/resepsionis', 'middleware' => 'isResepsionis'], function () {
    Route::get('/', function () {
        return view('pages.resepsionis.dashboard');
    })->name('resepsionis');

    Route::resource('/pasien', 'Resepsionis\PatientController');
});

/*
|--------------------------------------------------------------------------
| Dokter Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/dokter', 'middleware' => 'isDokter'], function () {
    Route::get('/', function () {
        return view('pages.dokter.dashboard');
    })->name('dokter');
});

/*
|--------------------------------------------------------------------------
| Apoteker Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => '/apoteker', 'middleware' => 'isApoteker'], function () {
    Route::get('/', function () {
        return view('pages.apoteker.dashboard');
    })->name('apoteker');

    Route::resource('/obat/kategori', 'Apoteker\KategoriObatController');
    Route::resource('/data-obat', 'Apoteker\ObatController');
});

Auth::routes();
