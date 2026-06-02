<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
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

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{book}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{book}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/boutique', [BookController::class, 'index']);

Route::get('/mention-legale', function () {
    return view('ML');
});


Route::get('/jolie', function () {
    return view('components.jolie');
});

Route::get('/product/{book}', [BookController::class, 'show'])->name('product.show');

Route::prefix('admin')->group(function () {
    Route::get('/books', [BookController::class, 'adminIndex'])->name('admin.books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});