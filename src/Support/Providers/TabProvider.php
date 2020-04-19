<?php

namespace AvoRed\Framework\Support\Providers;

use AvoRed\Framework\Tab\Manager;
use AvoRed\Framework\Tab\TabItem;
use Illuminate\Support\ServiceProvider;
use AvoRed\Framework\Support\Facades\Tab;

class TabProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        $this->registerTabs();
    }

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->registerManager();
        $this->app->singleton('tab', 'AvoRed\Framework\Tab\Manager');
    }

    /**
     * Register the tab Manager Instance.
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton(
            'tab',
            function () {
                new Manager();
            }
        );
    }

    /**
     * Get the services provided by the provider.
     * @return array
     */
    public function provides()
    {
        return ['tab', 'AvoRed\Framework\Tab\Manager'];
    }

    /**
     * Register Tabs for the Different CRUD operations.
     * @return void
     */
    public function registerTabs()
    {
        Tab::put('catalog.category', function (TabItem $tab) {
            $tab->key('catalog.category.info')
                ->label('avored::system.comms.basic-info')
                ->description('avored::catalog.category.form-info')
                ->view('avored::catalog.category._fields');
        });

        Tab::put('user.role', function (TabItem $tab) {
            $tab->key('user.role.info')
                ->label('avored::system.comms.basic-info')
                ->description('avored::user.role.form-info')
                ->view('avored::user.role._fields');
        });
        Tab::put('user.role', function (TabItem $tab) {
            $tab->key('user.role.permission')
                ->label('avored::user.role.permission')
                ->description('avored::user.role.permission-info')
                ->view('avored::user.role._permissions');
        });
    }
}
