<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasketController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products', [BasketController::class, 'showProducts']);
Route::post('/basket/add', [BasketController::class, 'addToBasket']);
Route::get('/basket', [BasketController::class, 'showBasket']);
