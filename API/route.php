<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use Libraries\Redirect\Route;

Route::get('/', function () {

    $client = new \Libraries\Client\Client();

    $a =$client->get('https://icon-mentor-choose-api.skrt.cc/mentors/all?password=ICON%20NEW%20JOURNEY%2020235');
    dd($a);

});
Route::get('/category', [MainController::class, 'getCategories']);
Route::get('/categories/{category}/products', [MainController::class, 'getProducts']);
Route::get('/categories/{category}/products/{pid}', [MainController::class, 'showProduct']);
Route::post('/categories/{category}/products', [MainController::class, 'createProduct']);
Route::delete('/categories/{category}/products/{pid}', [MainController::class, 'deleteProduct']);

Route::post('/pay/{order_id}/{bank_code}', [PaymentController::class, 'pay']);
Route::get('/pay/verify', [PaymentController::class, 'verifyPayment']);

