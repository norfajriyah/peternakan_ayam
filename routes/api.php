<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerkembanganController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Middleware\CekToken;
use App\Models\Doc;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

// doc
Route::resource('doc', DocController::class)->middleware(CekToken::class);

//perkembangan
Route::resource('perkembangan', PerkembanganController::class)->middleware(CekToken::class);

//pakan
Route::resource('pakan', PakanController::class)->middleware(CekToken::class);

//kesehatan
Route::resource('kesehatan', KesehatanController::class)->middleware(CekToken::class);

//penjualan
Route::resource('penjualan', PenjualanController::class)->middleware(CekToken::class);

Route::apiResource('user', UserController::class)->middleware(CekToken::class);