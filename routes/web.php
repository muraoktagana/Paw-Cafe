<?php

// use App\Http\Controllers\Bahan_bakuController;

use App\Http\Controllers\DiskonController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PemasokanController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::post('/validasi', 'validasi');
    Route::get('/logout', 'logout');
});

Route::middleware(['statuslogin'])->group(function() {

    Route::controller(PesananController::class)->group(function(){
        Route::get('/', 'index');
        Route::post('/', 'search');
        Route::get('/add-to-cart/{id}', 'addToCart');
        Route::delete('/remove-from-cart', 'removeCartItem');
        Route::get('/clear-cart', 'clearCart');


        Route::post('/checkout', 'checkout');
    });

    Route::controller(LaporanController::class)->group(function () {
        Route::get('/laporan-penjualan', 'laporan');
    });

    Route::controller(UsersController::class)->group(function(){
        Route::get('/users', 'show');
        Route::post('/users', 'search');
        Route::post('/users/add', 'add');
        Route::post('/users/change/{id}', 'change');
        Route::get('/users/remove/{id}', 'remove');
    });

    Route::controller(PembeliController::class)->group(function () {
        Route::get('/pembeli', 'showPembeli');
    });

    Route::controller(PemasokanController::class)->group(function(){
        Route::get('/stok', 'showStok');
        Route::post('/stok/add', 'addStok');
        Route::post('/stok/change/{id}', 'changeStok');
        Route::get('/stok/remove/{id}', 'removeStok');

        Route::get('/pemasokan', 'showPemasokan');
        Route::post('/pemasokan/add', 'addPemasokan');
        Route::post('/pemasokan/change/{id}', 'changePemasokan');
        Route::get('/pemasokan/remove/{id}', 'removePemasokan');

    });

    Route::controller(MenuController::class)->group(function(){
        Route::get('/menu', 'showMenu');
        Route::post('/menu/add', 'addMenu');
        Route::post('/menu/change/{id}', 'changeMenu');
        Route::get('/menu/remove/{id}', 'removeMenu');


        Route::get('/tambahan', 'showTambahan');

        Route::post('/tambahan/topping/add', 'addTopping');
        Route::post('/tambahan/topping/change/{id}', 'changeTopping');
        Route::get('/tambahan/topping/remove/{id}', 'removeTopping');

        Route::post('/tambahan/cup/add', 'addCup');
        Route::post('/tambahan/cup/change/{id}', 'changeCup');
        Route::get('/tambahan/cup/remove/{id}', 'removeCup');
    });

    Route::controller(KategoriController::class)->group(function(){
        Route::get('/kategori', 'showKategori');
        Route::post('/kategori/add', 'addKategori');
        Route::post('/kategori/change/{id}', 'changeKategori');
        Route::get('/kategori/remove/{id}', 'removeKategori');
    });

    Route::controller(DiskonController::class)->group(function(){
        Route::get('/diskon', 'showDiskon');
        Route::post('/diskon/add', 'addDiskon');
        Route::post('/diskon/change/{id}', 'changeDiskon');
        Route::get('/diskon/remove/{id}', 'removeDiskon');
    });
});
