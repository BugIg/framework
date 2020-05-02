<?php

use AvoRed\Framework\Catalog\Controllers\AttributeController;
use AvoRed\Framework\Catalog\Controllers\CategoryController;
use AvoRed\Framework\Catalog\Controllers\PropertyController;

use AvoRed\Framework\Cms\Controllers\PageController;
use AvoRed\Framework\Cms\Controllers\MenuController;

use AvoRed\Framework\Order\Controllers\OrderStatusController;

use AvoRed\Framework\User\Controllers\LoginController;
use AvoRed\Framework\User\Controllers\UserGroupController;
use AvoRed\Framework\User\Controllers\ResetPasswordController;
use AvoRed\Framework\User\Controllers\RoleController;
use AvoRed\Framework\User\Controllers\AdminUserController;
use AvoRed\Framework\User\Controllers\ForgotPasswordController;

use AvoRed\Framework\System\Controllers\DashboardController;
use AvoRed\Framework\System\Controllers\LanguageController;
use AvoRed\Framework\System\Controllers\CurrencyController;
use AvoRed\Framework\System\Controllers\ConfigurationController;

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

Route::middleware(['web', 'admin.auth', 'permission'])
    ->prefix($baseAdminUrl)
    ->name('admin.')
    ->group(function () {


        Route::get('', [DashboardController::class, 'index'])
            ->name('dashboard');


        /******** CATALOG ROUTES  *********/
        Route::resource('attribute', AttributeController::class)
            ->except('show');
        Route::resource('category', CategoryController::class)
            ->except('show');
        Route::resource('property', PropertyController::class)
            ->except('show');



        /******** CMS ROUTES  *********/
        Route::resource('page', PageController::class)
            ->except('show');


        /******** CMS ROUTES  *********/
        Route::resource('user-group', UserGroupController::class)
            ->except('show');
        Route::resource('menu', MenuController::class)
            ->except('show');


        /******** ORDER ROUTES  *********/
        Route::resource('order-status', OrderStatusController::class)
            ->except('show');

        /******** USERS ROUTES  *********/
        Route::resource('role', RoleController::class)
            ->except('show');
        Route::resource('admin-user', AdminUserController::class)
            ->except('show');




        /******** SYSTEM ROUTES  *********/
        Route::resource('currency', CurrencyController::class)
            ->except('show');

        Route::resource('language', LanguageController::class)
            ->except('show');
        Route::get('configuration', [ConfigurationController::class, 'index'])
        ->name('configuration.index');
        Route::post('configuration', [ConfigurationController::class, 'store'])
        ->name('configuration.store');
    });
