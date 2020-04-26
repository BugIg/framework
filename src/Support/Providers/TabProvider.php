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


        Tab::put('catalog.property', function (TabItem $tab) {
            $tab->key('catalog.property.info')
                ->label('avored::system.comms.basic-info')
                ->description('avored::catalog.property.form-info')
                ->view('avored::catalog.property._fields');
        });

        Tab::put('catalog.property', function (TabItem $tab) {
            $tab->key('catalog.property.options')
                ->label('avored::catalog.property.options-label')
                ->description('avored::catalog.property.options-desc')
                ->view('avored::catalog.property._options');
        });

        Tab::put('catalog.attribute', function (TabItem $tab) {
            $tab->key('catalog.attribute.info')
                ->label('avored::system.comms.basic-info')
                ->description('avored::catalog.attribute.form-info')
                ->view('avored::catalog.attribute._fields');
        });




        Tab::put('cms.page', function (TabItem $tab) {
            $tab->key('cms.page.info')
                ->label('avored::system.comms.basic-info')
                ->description('avored::cms.page.form-info')
                ->view('avored::cms.page._fields');
        });

        Tab::put('cms.menu', function (TabItem $tab) {
            $tab->key('cms.menu.info')
                ->label('avored::system.comms.basic-info')
                ->description('avored::cms.menu.form-info')
                ->view('avored::cms.menu._fields');
        });
        Tab::put('cms.menu', function (TabItem $tab) {
            $tab->key('cms.menu.builder')
                ->label('avored::cms.menu.builder-title')
                ->description('avored::cms.menu.builder-description')
                ->view('avored::cms.menu._builder');
        });



        Tab::put('order.order-status', function (TabItem $tab) {
            $tab->key('order.order-status.info')
                ->label('avored::system.comms.basic-info')
                ->description('avored::order.order-status.form-info')
                ->view('avored::order.order-status._fields');
        });



        Tab::put('user.user-group', function (TabItem $tab) {
            $tab->key('user.user-group.info')
                ->label('avored::system.comms.basic-info')
                ->description('avored::user.user-group.form-info')
                ->view('avored::user.user-group._fields');
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
        Tab::put('system.language', function (TabItem $tab) {
            $tab->key('system.language.permission')
                ->label('avored::system.language.basic-info')
                ->description('avored::system.language.form-info')
                ->view('avored::system.language._fields');
        });

        Tab::put('system.currency', function (TabItem $tab) {
            $tab->key('system.currency.permission')
                ->label('avored::system.currency.basic-info')
                ->description('avored::system.currency.form-info')
                ->view('avored::system.currency._fields');
        });
    }
}
