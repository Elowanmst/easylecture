<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/newmdp', function () {
    return view('newmdp');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/boutique', [BookController::class, 'index']);

Route::get('/mention-legale', function () {
    return view('ML');
});


Route::get('/jolie', function () {
    return view('components.jolie');
});

Route::get('/product/{book}', [BookController::class, 'show'])->name('product.show');