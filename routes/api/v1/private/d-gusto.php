<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\AuthController;


Route::middleware('auth:sanctum')->group(function () {

    Route::group(['middleware' => ['role:admin']], function () {
        // Food
        Route::post('foods', [FoodsController::class, 'store']);
        Route::put('foods/{food}', [FoodsController::class, 'update']);
        Route::delete('foods/{food}', [FoodsController::class, 'destroy']);
        // Order
        Route::get('orders', [OrdersController::class, 'index']);
    });
        // Order
        Route::get('orders/{order}', [OrdersController::class, 'show']);
        Route::post('orders', [OrdersController::class, 'store']);
        Route::delete('orders/{order}', [OrdersController::class, 'destroy']);
        Route::put('orders/{order}', [OrdersController::class, 'update']);

    // cerrar sesion
    Route::get('logout',[AuthController::class, 'logout']);
});


