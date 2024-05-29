
<?php

use App\Http\Controllers\DocController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PerkembanganController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthControllerWeb;
use App\Http\Controllers\Web\ProductControllerWeb;
use App\Http\Middleware\CekSession;

Route::get('/', function () {
    return view('welcome');
});
 
Route::controller(AuthControllerWeb::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware(CekSession::class)->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
 
    Route::get('/profile', [AuthControllerWeb::class, 'profile'])->name('profile');

    Route::get('/products', [DocController::class, 'showDoc'])->name('products');
    Route::get('/products/edit/{id}', [DocController::class, 'detail'])->name('products.show');
    Route::put('/products/edit/{id}', [DocController::class, 'edit'])->name('products.edit');
    Route::delete('/products/destroy/{id}', [DocController::class, 'hapus'])->name('products.destroy');

    Route::get('/perkembangan', [PerkembanganController::class, 'showPerkembangan'])->name('perkembangan');
    Route::get('/perkembangan/show/{id}', [PerkembanganController::class, 'detail'])->name('perkembangan.show');
    Route::put('/perkembangan/edit/{id}', [PerkembanganController::class, 'edit'])->name('perkembangan.edit');
    Route::delete('/perkembangan/destroy/{id}', [PerkembanganController::class, 'hapus'])->name('perkembangan.destroy');

    Route::get('/pakan', [PakanController::class, 'showPakan'])->name('pakan');
    Route::get('/pakan/show/{id}', [PakanController::class, 'detail'])->name('pakan.show');
    Route::put('/pakan/edit/{id}', [PakanController::class, 'edit'])->name('pakan.edit');
    Route::delete('/pakan/destroy/{id}', [PakanController::class, 'hapus'])->name('pakan.destroy');

    Route::get('/kesehatan', [KesehatanController::class, 'showKesehatan'])->name('kesehatan');
    Route::get('/kesehatan/show/{id}', [KesehatanController::class, 'detail'])->name('kesehatan.show');
    Route::put('/kesehatan/edit/{id}', [KesehatanController::class, 'edit'])->name('kesehatan.edit');
    Route::delete('/kesehatan/destroy/{id}', [KesehatanController::class, 'hapus'])->name('kesehatan.destroy');

    Route::get('/penjualan', [PenjualanController::class, 'showPenjualan'])->name('penjualan');
    Route::get('/penjualan/show/{id}', [PenjualanController::class, 'detail'])->name('penjualan.show');
    Route::put('/penjualan/edit/{id}', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    Route::delete('/penjualan/destroy/{id}', [PenjualanController::class, 'hapus'])->name('penjualan.destroy');
});