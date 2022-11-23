<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('orders', OrdersController::class);
    Route::apiResource('foods', FoodsController::class);
    Route::get('logout',[AuthController::class, 'logout']);
});

Route::get('/foods', [FoodsController::class, 'show'])->name('foods');
