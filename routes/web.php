<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\diskonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\pegawaiController;

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

Route::group(['middleware'=>'guest'],function(){
	Route::get('/login',[GeneralController::class,'loginPage'])->name('login');
	Route::post('/login',[GeneralController::class,'doLogin']);
});

Route::group(['middleware'=>'auth'],function(){
	Route::get('/', [GeneralController::class,'admin'])->name('admin');
	Route::get('/logout',[GeneralController::class,'logout'])->name('logout');
    Route::prefix('pegawai')->group(function () {
        Route::get('/', [PegawaiController::class, 'index'])->name('pegawai.index');
        Route::get('/datatable', [PegawaiController::class, 'Datatable'])->name('pegawai.datatable');
        Route::get('/show/{id?}', [PegawaiController::class, 'show'])->name('pegawai.show');
        Route::post('/storeOrUpdate/{id?}', [PegawaiController::class, 'storeOrUpdate'])->name('pegawai.storeOrUpdate');
        Route::delete('/delete/{id?}', [PegawaiController::class, 'destroy'])->name('pegawai.delete');
    });
	Route::prefix('diskon')->group(function () {
        Route::get('/', [diskonController::class, 'index'])->name('diskon.index');
        Route::get('/datatable', [diskonController::class, 'Datatable'])->name('diskon.datatable');
        Route::get('/show/{id?}', [diskonController::class, 'show'])->name('diskon.show');
        Route::post('/storeOrUpdate/{id?}', [diskonController::class, 'storeOrUpdate'])->name('diskon.storeOrUpdate');
        Route::delete('/delete/{id?}', [diskonController::class, 'destroy'])->name('diskon.delete');
    });
	Route::prefix('barang')->group(function () {
        Route::get('/', [BarangController::class, 'index'])->name('barang.index');
        Route::get('/datatable', [BarangController::class, 'Datatable'])->name('barang.datatable');
        Route::get('/show/{id?}', [BarangController::class, 'show'])->name('barang.show');
        Route::post('/storeOrUpdate/{id?}', [BarangController::class, 'storeOrUpdate'])->name('barang.storeOrUpdate');
        Route::delete('/delete/{id?}', [BarangController::class, 'destroy'])->name('barang.delete');
    });
	Route::prefix('member')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('member.index');
        Route::get('/datatable', [MemberController::class, 'Datatable'])->name('member.datatable');
        Route::get('/show/{id?}', [MemberController::class, 'show'])->name('member.show');
        Route::post('/storeOrUpdate/{id?}', [MemberController::class, 'storeOrUpdate'])->name('member.storeOrUpdate');
        Route::delete('/delete/{id?}', [MemberController::class, 'destroy'])->name('member.delete');
    });
});

