<?php

use App\Http\Controllers\FoodsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('foods/{food}', [FoodsController::class, 'show']);
Route::get('foods', [FoodsController::class, 'index']);
Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);


