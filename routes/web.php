<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\LibraryController;

use App\Http\Controllers\OrderController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'bestseller']);

Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');

Route::get('/newmdp', function () {
    return view('newmdp');
})->name('password.request');

Route::view('/contact', 'contact')->name('contact');

Route::view('/mention-legale', 'ML')->name('legal');



Route::get('/boutique', [BookController::class, 'index'])
    ->name('boutique');

Route::get('/product/{book}', [BookController::class, 'show'])
    ->name('product.show');



Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::post('/cart/add/{book}', [CartController::class, 'add'])
    ->name('cart.add');

Route::patch('/cart/update/{book}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/cart/remove/{book}', [CartController::class, 'remove'])
    ->name('cart.remove');



Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('checkout');



Route::post('/cart/checkout', [CartController::class, 'checkout'])
    ->name('cart.checkout');

Route::get('/cart/success', [CartController::class, 'success'])
    ->name('cart.success');

Route::get('/mon-compte', function () {

    $user = Auth::user();

    $orders = Order::with('items')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('mon-compte', [
        'user' => $user,
        'orders' => $orders,
    ]);

})->middleware('auth')->name('mon-compte');


Route::get('/commandes', [OrderController::class, 'index'])
    ->middleware('auth')
    ->name('orders.index');

Route::get('/commandes/{order}', [OrderController::class, 'show'])
    ->middleware('auth')
    ->name('orders.show');

Route::get('/mes-livres', [LibraryController::class, 'index'])->name('library.index')->middleware('auth');
Route::get('/mes-livres/{book}', [LibraryController::class, 'read'])->name('library.read')->middleware('auth');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {


        Route::get('/books', [BookController::class, 'adminIndex'])
            ->name('admin.books.index');


        Route::get('/boutique', [BookController::class, 'index']);

        Route::get('/books/create', [BookController::class, 'create'])
            ->name('books.create');

        Route::post('/books', [BookController::class, 'store'])
            ->name('books.store');

        Route::get('/books/{book}/edit', [BookController::class, 'edit'])
            ->name('books.edit');

        Route::put('/books/{book}', [BookController::class, 'update'])
            ->name('books.update');

        Route::delete('/books/{book}', [BookController::class, 'destroy'])
            ->name('books.destroy');
    });