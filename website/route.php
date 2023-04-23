<?php

use App\Http\Controllers\MainController;
use Libraries\Redirect\Route;

Route::get('/', [MainController::class, 'index']);
Route::get('/search_by_category', [MainController::class, 'searchByCategory']);
Route::get('/search_by_name', [MainController::class, 'searchByName']);
