<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('index');

Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('', [CartController::class, 'index'])->name('index');
    Route::get('/clear', [CartController::class, 'clear'])->name('clear');
    Route::put('', [CartController::class, 'add'])->name('add');
    Route::delete('', [CartController::class, 'delete'])->name('delete');
});

Route::prefix('order')->name('order.')->group(function () {
    Route::get('', [OrderController::class, 'index'])->name('index');
    Route::post('', [OrderController::class, 'create'])->name('create');
    Route::delete('{order}', [OrderController::class, 'delete'])->name('delete');
});
