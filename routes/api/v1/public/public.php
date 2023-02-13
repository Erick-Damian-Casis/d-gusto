<?php

use App\Http\Controllers\FoodsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);
Route::get('foods', [FoodsController::class, 'index']);

