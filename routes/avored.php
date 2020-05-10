<?php

use App\Http\Controllers\AvoRed\HomeController;
use Illuminate\Support\Facades\Route;

$baseFrontUrl = config('avored.front_url');

Route::prefix($baseFrontUrl)
    ->name('avored.')
    ->group(function () {

        Route::get('', [HomeController::class, 'index'])
            ->name('home');

    });
