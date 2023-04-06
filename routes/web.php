<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\MemberController;
use App\Http\COntrollers\AuthController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PemesananController;
use App\Models\paket;
use App\Http\Controllers\TransaksiController;

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


// depan route
Route::get('/', 'App\Http\Controllers\AdminController@login');
Route::post('/', 'App\Http\Controllers\AdminController@flogin');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout');

//admin route
Route::group(['middleware' => ['web', 'admin']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'App\Http\Controllers\AdminController@index');
        Route::group(['prefix' => 'outlet'], function () {
            Route::get('/', 'App\Http\Controllers\OutletController@index');
            Route::get('/add', 'App\Http\Controllers\OutletController@create');
            Route::post('/add', 'App\Http\Controllers\OutletController@store');
            Route::get('/edit/{id}', 'App\Http\Controllers\OutletController@edit');
            Route::post('/edit/{id}', 'App\Http\Controllers\OutletController@update');
            Route::resource('delete', OutletController::class);
        });
        Route::group(['prefix' => 'paket'], function () {
            Route::get('/', 'App\Http\Controllers\PaketController@index');
            Route::get('/add', 'App\Http\Controllers\PaketController@create');
            Route::post('/add', 'App\Http\Controllers\PaketController@store');
            Route::get('/edit/{id}', 'App\Http\Controllers\PaketController@edit');
            Route::post('/edit/{id}', 'App\Http\Controllers\PaketController@update');
            Route::resource('delete4', PaketController::class);
        });
        Route::group(['prefix' => 'customer'], function () {
            Route::get('/', 'App\Http\Controllers\MemberController@index');
            Route::get('/add', 'App\Http\Controllers\MemberController@create');
            Route::post('/add', 'App\Http\Controllers\MemberController@store');
            Route::get('/edit/{id}', 'App\Http\Controllers\MemberController@edit');
            Route::post('/edit/{id}', 'App\Http\Controllers\MemberController@update');
            
        });
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'App\Http\Controllers\AuthController@index');
            Route::get('/add', 'App\Http\Controllers\AuthController@create');
            Route::post('/add', 'App\Http\Controllers\AuthController@store');
            Route::get('/edit/{id}', 'App\Http\Controllers\AuthController@edit');
            Route::post('/edit/{id}', 'App\Http\Controllers\AuthController@update');
            Route::resource('delete3', AuthController::class);
        });
        Route::group(['prefix' => 'laporan'], function () {
            Route::get('/', 'App\Http\Controllers\DetailTransaksiController@index');
           
        });
        Route::group(['prefix' => 'transaksi'], function () {
            Route::get('/', 'App\Http\Controllers\TransaksiController@index');
            Route::get('/edit/{id}','App\Http\Controllers\TransaksiController@edit');
            Route::post('/edit/{id}','App\Http\Controllers\TransaksiController@update');
        });
        Route::group(['prefix' => 'pemesanan'], function () {
            Route::get('/', 'App\Http\Controllers\PemesananController@index');
            Route::get('/cart/{id}', 'App\Http\Controllers\PemesananController@store');
            Route::post('/cart/{id}', 'App\Http\Controllers\PemesananController@store');
            Route::get('/delete/{id}', 'App\Http\Controllers\PemesananController@destroy');
            Route::post('/cek', 'App\Http\Controllers\PemesananController@checkout');
        });
    });
});

//kasir route
Route::group(['middleware' => ['web', 'kasir']], function () {
    Route::group(['prefix' => 'kasir'], function () {
        Route::get('/', 'App\Http\Controllers\AdminController@index');
        Route::group(['prefix' => 'laporan'], function () {
            Route::get('/', 'App\Http\Controllers\DetailTransaksiController@index');
            Route::get('/edit/{id}','App\Http\Controllers\TransaksiController@edit');
        });
        Route::group(['prefix' => 'customer'], function () {
            Route::get('/', 'App\Http\Controllers\MemberController@index');
            Route::get('/add', 'App\Http\Controllers\MemberController@create');
            Route::post('/add', 'App\Http\Controllers\MemberController@store');
            Route::get('/edit/{id}', 'App\Http\Controllers\MemberController@edit');
            Route::post('/edit/{id}', 'App\Http\Controllers\MemberController@update');
        });
        Route::group(['prefix' => 'pemesanan'], function () {
            Route::get('/', 'App\Http\Controllers\PemesananController@index');
            Route::get('/cart/{id}', 'App\Http\Controllers\PemesananController@store');
            Route::post('/cart/{id}', 'App\Http\Controllers\PemesananController@store');
            Route::post('/cek', 'App\Http\Controllers\PemesananController@checkout');
            Route::get('/delete/{id}', 'App\Http\Controllers\PemesananController@destroy');
        });
        Route::group(['prefix' => 'transaksi'], function () {
            Route::get('/', 'App\Http\Controllers\TransaksiController@index');
            Route::get('/edit/{id}','App\Http\Controllers\TransaksiController@edit');
            Route::post('/edit/{id}','App\Http\Controllers\TransaksiController@update');
        });
    });
});


//owner route
Route::group(['middleware' => ['web', 'owner']], function () {
    Route::group(['prefix' => 'owner'], function () {
        Route::get('/', 'App\Http\Controllers\AdminController@index');
        Route::group(['prefix' => 'laporan'], function () {
            Route::get('/', 'App\Http\Controllers\DetailTransaksiController@index');
        });
    });
});
Route::resource('delete2', MemberController::class);
//export route
Route::get('/excel', 'App\Http\Controllers\NotaController@index');
Route::get('/excel/export', 'App\Http\Controllers\NotaController@export');