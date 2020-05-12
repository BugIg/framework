<?php

use App\Http\Controllers\AvoRed\LoginController;
use App\Http\Controllers\AvoRed\RegisterController;
use App\Http\Controllers\AvoRed\HomeController;
use App\Http\Controllers\AvoRed\CategoryController;
use App\Http\Controllers\AvoRed\ProductController;
use App\Http\Controllers\AvoRed\CartController;
use App\Http\Controllers\AvoRed\CheckoutController;
use App\Http\Controllers\AvoRed\OrderController;
use Illuminate\Support\Facades\Route;

$baseFrontUrl = config('avored.front_url');

Route::prefix($baseFrontUrl)
    ->name('avored.')
    ->group(function () {

        Route::get('login', [LoginController::class, 'showLoginForm'])
            ->name('login');
        Route::post('login', [LoginController::class, 'login']);

        Route::get('register', [RegisterController::class, 'showRegisterForm'])
            ->name('register');
        Route::post('register', [RegisterController::class, 'register']); 
        

        Route::get('', [HomeController::class, 'index'])
            ->name('home');

        Route::get('category/{slug}', [CategoryController::class, 'show'])
            ->name('category.show');

        Route::get('product/{slug}', [ProductController::class, 'show'])
            ->name('product.show');

        Route::post('cart', [CartController::class, 'addToCart'])
            ->name('add.to.cart');
        Route::get('cart', [CartController::class, 'show'])
            ->name('cart.show');

        Route::get('checkout', [CheckoutController::class, 'show'])
            ->name('checkout.show');


        Route::post('order', [OrderController::class, 'place'])
            ->name('order.place');

        Route::get('order', [OrderController::class, 'successful'])
            ->name('order.successful');


    });
