<?php

use App\Http\Controllers\AvoRed\LoginController;
use App\Http\Controllers\AvoRed\RegisterController;
use App\Http\Controllers\AvoRed\HomeController;
use App\Http\Controllers\AvoRed\CategoryController;
use App\Http\Controllers\AvoRed\ProductController;
use App\Http\Controllers\AvoRed\CartController;
use App\Http\Controllers\AvoRed\CheckoutController;
use App\Http\Controllers\AvoRed\OrderController;
use App\Http\Controllers\AvoRed\ProfileController;
use Illuminate\Support\Facades\Route;

$baseFrontUrl = config('avored.front_url');

Route::prefix($baseFrontUrl)
    ->name('avored.')
    ->group(function () {

        Route::get('login', [LoginController::class, 'showLoginForm'])
            ->name('login');
        Route::post('login', [LoginController::class, 'login']);

        Route::post('logout', [LoginController::class, 'logout'])
        ->name('logout');

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

        Route::middleware('auth')
            ->name('account.')
            ->prefix('account')
            ->group(function () {

                Route::get('profile', [ProfileController::class, 'show'])
                    ->name('profile.show');

                Route::get('profile/edit', [ProfileController::class, 'edit'])
                    ->name('profile.edit');
                Route::put('profile', [ProfileController::class, 'update'])
                    ->name('profile.update');

                Route::get('profile/order', [ProfileController::class, 'order'])
                    ->name('profile.order');
                Route::get('profile/order/{order}', [ProfileController::class, 'orderView'])
                    ->name('profile.order.view');

                Route::get('profile/address', [ProfileController::class, 'address'])
                    ->name('profile.address');
                Route::get('profile/address/{address}', [ProfileController::class, 'addressEdit'])
                    ->name('profile.address.edit');
                Route::put('profile/address{address}', [ProfileController::class, 'addressUpdate'])
                    ->name('profile.address.update');
            });


    });
