<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', fn() => view('login'))->name('login');

Route::get('/register', fn() => view('register'))->name('register');

Route::get('/newmdp', function () {
    return view('newmdp');
});

Route::get('/contact', function () {
    return view('contact');
});

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
})->name('mon-compte');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{book}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{book}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart/success', [CartController::class, 'success'])->name('cart.success');

Route::get('/commandes', [OrderController::class, 'index'])->name('orders.index');
Route::get('/commandes/{order}', [OrderController::class, 'show'])->name('orders.show');

Route::middleware('auth')->group(function () {
    Route::get('/mes-livres', [LibraryController::class, 'index'])->name('library.index');
    Route::get('/mes-livres/{book}', [LibraryController::class, 'read'])->name('library.read');
});

Route::get('/boutique', [BookController::class, 'index']);

Route::get('/mention-legale', function () {
    return view('ML');
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