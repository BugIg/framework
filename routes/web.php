<?php

use AvoRed\Framework\User\Controllers\LoginController;
use AvoRed\Framework\System\Controllers\DashboardController;
use AvoRed\Framework\User\Controllers\ForgotPasswordController;
use AvoRed\Framework\User\Controllers\ResetPasswordController;
use AvoRed\Framework\Catalog\Controllers\CategoryController;

$baseAdminUrl = config('avored.admin_url');

Route::middleware(['web'])
    ->prefix($baseAdminUrl)
    ->namespace('AvoRed\\Framework')
    ->name('admin.')
    ->group(function () {

        Route::get('login', [LoginController::class, 'loginForm'])
            ->name('login');
        Route::post('login', [LoginController::class, 'login'])
            ->name('login.post');

        Route::get('password/reset', [ForgotPasswordController::class, 'linkRequestForm'])
            ->name('password.request');
        Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
            ->name('password.email');

        Route::get('password/reset/{token}', [ResetPasswordController::class, 'resetForm'])
            ->name('password.reset');
        Route::post('password/reset/', [ResetPasswordController::class, 'reset'])
            ->name('password.update');

        //password/reset

        Route::post('logout', [LoginController::class, 'logout'])
            ->name('logout');

    });

Route::middleware(['web', 'admin.auth'])
    ->prefix($baseAdminUrl)
    ->name('admin.')
    ->group(function () {
        Route::get('', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('category', CategoryController::class)
            ->except('show');
    });
