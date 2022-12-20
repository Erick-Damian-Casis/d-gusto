<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\AuthController;


//Route::middleware('auth:sanctum')->group(function () {
    // visualizar comidas
//    Route::group(['middleware' => ['permission:view_foods']], function () {
        Route::get('foods', [FoodsController::class, 'index']);
        Route::get('foods/{food}', [FoodsController::class, 'show']);
//    });

    // visualizar ordenes
//    Route::group(['middleware' => ['permission:view_orders']], function () {
        Route::get('orders', [OrdersController::class, 'index']);
        Route::get('orders/{order}', [OrdersController::class, 'show']);
//    });

    // modificar comidas
//    Route::group(['middleware' => ['permission:modify_foods']], function () {
        Route::post('foods', [FoodsController::class, 'store']);
        Route::delete('foods/{food}', [FoodsController::class, 'destroy']);
        Route::put('foods/{food}', [FoodsController::class, 'update']);
//    });

    // modificar ordenes
//    Route::group(['middleware' => ['permission:modify_orders']], function () {
        Route::delete('orders/{order}', [OrdersController::class, 'destroy']);
        Route::put('orders/{order}', [OrdersController::class, 'update']);
//    });

    // Realizar orden
//    Route::group(['middleware' => ['permission:create_orders']], function () {
        Route::post('orders', [OrdersController::class, 'store']);
//    });

    // cerrar sesion
    Route::get('logout',[AuthController::class, 'logout']);
//});


