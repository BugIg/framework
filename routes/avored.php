<?php

use App\Http\Controllers\AvoRed\HomeController;
use App\Http\Controllers\AvoRed\CategoryController;
use App\Http\Controllers\AvoRed\ProductController;
use App\Http\Controllers\AvoRed\CartController;
use App\Http\Controllers\AvoRed\CheckoutController;
use Illuminate\Support\Facades\Route;

$baseFrontUrl = config('avored.front_url');

Route::prefix($baseFrontUrl)
    ->name('avored.')
    ->group(function () {

        Route::get('', [HomeController::class, 'index'])
            ->name('home');

        Route::get('category/{slug}', [CategoryController::class, 'show'])
            ->name('category.show');

        Route::post('cart', [CartController::class, 'addToCart'])
            ->name('add.to.cart');
        Route::get('cart', [CartController::class, 'show'])
            ->name('cart.show');

        Route::get('checkout', [CheckoutController::class, 'show'])
            ->name('checkout.show');

        Route::get('product/{slug}', [ProductController::class, 'show'])
            ->name('product.show');
    });
