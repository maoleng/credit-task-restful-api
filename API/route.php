<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use Libraries\Redirect\Route;

Route::get('/category', [MainController::class, 'getCategories']);
Route::get('/categories/{category}/products', [MainController::class, 'getProducts']);
Route::get('/categories/{category}/products/{pid}', [MainController::class, 'showProduct']);
Route::post('/categories/{category}/products', [MainController::class, 'createProduct']);
Route::delete('/categories/{category}/products/{pid}', [MainController::class, 'deleteProduct']);

Route::post('/pay/{order_id}/{bank_code}', [PaymentController::class, 'pay']);
Route::get('/pay/verify', [PaymentController::class, 'verifyPayment']);

