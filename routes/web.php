<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('products.index'));

Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => redirect()->route('products.index'))->name('dashboard');

    Route::resource('products', ProductController::class)
        ->only(['index', 'show']);

    Route::middleware('role:admin,editor')->group(function () {
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    });

    Route::middleware('role:admin')->group(function () {
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
});