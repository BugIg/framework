<?php

namespace AvoRed\Framework\Support\Providers;

use AvoRed\Framework\Cart\CartManager;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the service provider.
     * @return void
     */
    public function boot()
    {
        // $this->registerCart();
    }

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->registerServices();
        $this->app->alias('cart', CartManager::class);
    }

    /**
     * Register the Admin Menu instance.
     *
     * @return void
     */
    protected function registerServices()
    {
        $this->app->singleton(
            'cart',
            function ($app) {
                return new CartManager($app['session']);
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['cart', CartManager::class];
    }
}
