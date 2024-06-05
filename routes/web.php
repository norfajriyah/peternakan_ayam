
<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthControllerWeb;
use App\Http\Controllers\Web\DocController;
use App\Http\Controllers\Web\HasilController;
use App\Http\Controllers\Web\KesehatanController;
use App\Http\Controllers\Web\PakanController;
use App\Http\Controllers\Web\PenjualanController;
use App\Http\Controllers\Web\PerkembanganController;
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

    Route::resource('/products', DocController::class)->middleware(CekSession::class);
    Route::resource('/perkembangan', PerkembanganController::class)->middleware(CekSession::class);
    Route::resource('/pakan', PakanController::class)->middleware(CekSession::class);
    Route::resource('/kesehatan', KesehatanController::class)->middleware(CekSession::class);
    Route::resource('/penjualan', PenjualanController::class)->middleware(CekSession::class);
    Route::resource('/hasil', HasilController::class)->middleware(CekSession::class);
});