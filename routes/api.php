<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\{
    ProductController,
    CategoryController,
    CustomerController,
    OrderController,
    PosController,
};

Route::middleware('auth:sanctum')->group(function () {

    // Products
    Route::apiResource('products', ProductController::class)->only(['index', 'show']);

    // Categories
    Route::apiResource('categories', CategoryController::class)->only(['index']);

    // Customers
    Route::apiResource('customers', CustomerController::class)->only(['index', 'store', 'show']);

    // POS Cart (session-based or request-based cart actions)
    Route::post('pos/cart/add', [PosController::class, 'addCart']);
    Route::put('pos/cart/update/{rowId}', [PosController::class, 'updateCart']);
    Route::delete('pos/cart/remove/{rowId}', [PosController::class, 'removeCart']);
    Route::post('pos/checkout', [PosController::class, 'checkout']);

    // Orders
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{id}', [OrderController::class, 'show']);
});
