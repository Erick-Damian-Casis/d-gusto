<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\AuthController;


//Route::middleware('auth:sanctum')->group(function () {
    // Food
    Route::post('foods', [FoodsController::class, 'store']);
    Route::delete('foods/{food}', [FoodsController::class, 'destroy']);
    Route::put('foods/{food}', [FoodsController::class, 'update']);
    Route::get('foods/{food}', [FoodsController::class, 'show']);
    // Order
    Route::delete('orders/{order}', [OrdersController::class, 'destroy']);
    Route::put('orders/{order}', [OrdersController::class, 'update']);
    Route::post('orders', [OrdersController::class, 'store']);
    Route::get('orders', [OrdersController::class, 'index']);
    Route::get('orders/{order}', [OrdersController::class, 'show']);

    // cerrar sesion
    Route::get('logout',[AuthController::class, 'logout']);
//});


