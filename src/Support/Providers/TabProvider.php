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
        Tab::put('catalog.product', function (TabItem $tab) {
            $tab->key('catalog.product.info')
                ->label('avored-admin::system.comms.basic-info')
                ->description('avored-admin::catalog.product.form-info')
                ->view('avored-admin::catalog.product._fields');
        });

        Tab::put('catalog.category', function (TabItem $tab) {
            $tab->key('catalog.category.info')
                ->label('avored-admin::system.comms.basic-info')
                ->description('avored-admin::catalog.category.form-info')
                ->view('avored-admin::catalog.category._fields');
        });


        Tab::put('catalog.property', function (TabItem $tab) {
            $tab->key('catalog.property.info')
                ->label('avored-admin::system.comms.basic-info')
                ->description('avored-admin::catalog.property.form-info')
                ->view('avored-admin::catalog.property._fields');
        });

        Tab::put('catalog.property', function (TabItem $tab) {
            $tab->key('catalog.property.options')
                ->label('avored-admin::catalog.property.options-label')
                ->description('avored-admin::catalog.property.options-desc')
                ->view('avored-admin::catalog.property._options');
        });

        Tab::put('catalog.attribute', function (TabItem $tab) {
            $tab->key('catalog.attribute.info')
                ->label('avored-admin::system.comms.basic-info')
                ->description('avored-admin::catalog.attribute.form-info')
                ->view('avored-admin::catalog.attribute._fields');
        });

        Tab::put('catalog.attribute', function (TabItem $tab) {
            $tab->key('catalog.attribute.options')
                ->label('avored-admin::catalog.attribute.options-label')
                ->description('avored-admin::catalog.attribute.options-desc')
                ->view('avored-admin::catalog.attribute._options');
        });



        Tab::put('cms.page', function (TabItem $tab) {
            $tab->key('cms.page.info')
                ->label('avored-admin::system.comms.basic-info')
                ->description('avored-admin::cms.page.form-info')
                ->view('avored-admin::cms.page._fields');
        });

        Tab::put('cms.menu', function (TabItem $tab) {
            $tab->key('cms.menu.info')
                ->label('avored-admin::system.comms.basic-info')
                ->description('avored-admin::cms.menu.form-info')
                ->view('avored-admin::cms.menu._fields');
        });
        Tab::put('cms.menu', function (TabItem $tab) {
            $tab->key('cms.menu.builder')
                ->label('avored-admin::cms.menu.builder-title')
                ->description('avored-admin::cms.menu.builder-description')
                ->view('avored-admin::cms.menu._builder');
        });



        Tab::put('order.order-status', function (TabItem $tab) {
            $tab->key('order.order-status.info')
                ->label('avored-admin::system.comms.basic-info')
                ->description('avored-admin::order.order-status.form-info')
                ->view('avored-admin::order.order-status._fields');
        });



        Tab::put('user.user-group', function (TabItem $tab) {
            $tab->key('user.user-group.info')
                ->label('avored-admin::system.comms.basic-info')
                ->description('avored-admin::user.user-group.form-info')
                ->view('avored-admin::user.user-group._fields');
        });

        Tab::put('user.role', function (TabItem $tab) {
            $tab->key('user.role.info')
                ->label('avored-admin::system.comms.basic-info')
                ->description('avored-admin::user.role.form-info')
                ->view('avored-admin::user.role._fields');
        });
        Tab::put('user.admin-user', function (TabItem $tab) {
            $tab->key('user.admin-user.info')
                ->label('avored-admin::system.comms.basic-info')
                ->description('avored-admin::user.admin-user.form-info')
                ->view('avored-admin::user.admin-user._fields');
        });
        Tab::put('user.role', function (TabItem $tab) {
            $tab->key('user.role.permission')
                ->label('avored-admin::user.role.permission')
                ->description('avored-admin::user.role.permission-info')
                ->view('avored-admin::user.role._permissions');
        });
        Tab::put('system.language', function (TabItem $tab) {
            $tab->key('system.language.permission')
                ->label('avored-admin::system.language.basic-info')
                ->description('avored-admin::system.language.form-info')
                ->view('avored-admin::system.language._fields');
        });

        Tab::put('system.currency', function (TabItem $tab) {
            $tab->key('system.currency.permission')
                ->label('avored-admin::system.currency.basic-info')
                ->description('avored-admin::system.currency.form-info')
                ->view('avored-admin::system.currency._fields');
        });

        Tab::put('system.configuration', function (TabItem $tab) {
            $tab->key('system.configuration.general')
                ->label('avored-admin::system.configuration.general.basic-info')
                ->description('avored-admin::system.configuration.general.form-info')
                ->view('avored-admin::system.configuration.tabs.general');
        });
    }
}
