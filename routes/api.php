<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DocController;
use App\Http\Controllers\Api\HasilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\PerkembanganController;
use App\Http\Controllers\Api\PakanController;
use App\Http\Controllers\Api\KesehatanController;
use App\Http\Controllers\Api\PenjualanController;
use App\Http\Middleware\CekToken;
use App\Models\Doc;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

// doc
Route::resource('doc', DocController::class)->middleware(CekToken::class)
->name('index', 'api.doc.index')
->name('store', 'api.doc.store')
->name('create', 'api.doc.create')
->name('show', 'api.doc.show')
->name('update', 'api.doc.update')
->name('destroy', 'api.doc.destroy')
->name('edit', 'api.doc.edit');


//perkembangan
Route::resource('perkembangan', PerkembanganController::class)->middleware(CekToken::class)
->name('index', 'api.perkembangan.index')
->name('store', 'api.perkembangan.store')
->name('create', 'api.perkembangan.create')
->name('show', 'api.perkembangan.show')
->name('update', 'api.perkembangan.update')
->name('destroy', 'api.perkembangan.destroy')
->name('edit', 'api.perkembangan.edit');

//pakan
Route::resource('pakan', PakanController::class)->middleware(CekToken::class)
->name('index', 'api.pakan.index')
->name('store', 'api.pakan.store')
->name('create', 'api.pakan.create')
->name('show', 'api.pakan.show')
->name('update', 'api.pakan.update')
->name('destroy', 'api.pakan.destroy')
->name('edit', 'api.pakan.edit');

//kesehatan
Route::resource('kesehatan', KesehatanController::class)->middleware(CekToken::class)
->name('index', 'api.kesehatan.index')
->name('store', 'api.kesehatan.store')
->name('create', 'api.kesehatan.create')
->name('show', 'api.kesehatan.show')
->name('update', 'api.kesehatan.update')
->name('destroy', 'api.kesehatan.destroy')
->name('edit', 'api.kesehatan.edit');

//penjualan
Route::resource('penjualan', PenjualanController::class)->middleware(CekToken::class)
->name('index', 'api.penjualan.index')
->name('store', 'api.penjualan.store')
->name('create', 'api.penjualan.create')
->name('show', 'api.penjualan.show')
->name('update', 'api.penjualan.update')
->name('destroy', 'api.penjualan.destroy')
->name('edit', 'api.penjualan.edit');

//hasil performa
Route::apiResource('hasil', HasilController::class)->middleware(CekToken::class)
->name('index', 'api.hasil.index')
->name('store', 'api.hasil.store')
->name('create', 'api.hasil.create')
->name('show', 'api.hasil.show')
->name('update', 'api.hasil.update')
->name('destroy', 'api.hasil.destroy')
->name('edit', 'api.hasil.edit');

Route::apiResource('user', UserController::class)->middleware(CekToken::class);