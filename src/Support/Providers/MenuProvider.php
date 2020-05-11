<?php

namespace AvoRed\Framework\Support\Providers;

use AvoRed\Framework\Menu\MenuItem;
use AvoRed\Framework\Menu\MenuBuilder;
use Illuminate\Support\ServiceProvider;
use AvoRed\Framework\Support\Facades\Menu;

class MenuProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the Service Provider.
     * @return void
     */
    public function boot()
    {
        $this->registerAdminMenu();
    }

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->registerServices();
        $this->app->alias('menu', MenuBuilder::class);
    }

    /**
     * Register the Admin Menu instance.
     * @return void
     */
    protected function registerServices()
    {
        $this->app->singleton(
            'menu',
            function () {
                return new MenuBuilder();
            }
        );
    }

    /**
     * Get the services provided by the provider.
     * @return array
     */
    public function provides()
    {
        return ['menu', 'AvoRed\Framework\Menu\MenuBuilder'];
    }

    /**
     * Register Admin Menu for the AvoRed E commerce package.
     * @return void
     */
    public function registerAdminMenu()
    {

        /****** CATALOG MENU *******/
        $catalogMenu = Menu::make('catalog', function (MenuItem $menu) {
            $menu->label('avored-admin::system.admin-menus.catalog')
                ->type(MenuItem::ADMIN)
                ->icon('/vendor/avored/images/icons/shopping-cart.svg')
                ->route('#');
        })->get('catalog');

        $catalogMenu->subMenu('product', function (MenuItem $menu) {
            $menu->key('product')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.product')
                ->route('admin.product.index');
        });
        
        $catalogMenu->subMenu('category', function (MenuItem $menu) {
            $menu->key('category')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.category')
                ->route('admin.category.index');
        });

        $catalogMenu->subMenu('property', function (MenuItem $menu) {
            $menu->key('property')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.property')
                ->route('admin.property.index');
        });

        $catalogMenu->subMenu('attribute', function (MenuItem $menu) {
            $menu->key('attribute')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.attribute')
                ->route('admin.attribute.index');
        });



        /****** CMS MENU *******/
        $cmsMenu = Menu::make('cms', function (MenuItem $menu) {
            $menu->label('avored-admin::system.admin-menus.cms')
                ->type(MenuItem::ADMIN)
                ->icon('/vendor/avored/images/icons/icon-browser.svg')
                ->route('#');
        })->get('cms');

        $cmsMenu->subMenu('page', function (MenuItem $menu) {
            $menu->key('page')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.page')
                ->route('admin.page.index');
        });
        $cmsMenu->subMenu('menu', function (MenuItem $menu) {
            $menu->key('menu')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.menu')
                ->route('admin.menu.index');
        });



        /****** USERS MENU *******/
        $userMenu = Menu::make('user', function (MenuItem $menu) {
            $menu->label('avored-admin::system.admin-menus.user')
                ->type(MenuItem::ADMIN)
                ->icon('/vendor/avored/images/icons/icon-users.svg')
                ->route('#');
        })->get('user');

        $userMenu->subMenu('admin-user', function (MenuItem $menu) {
            $menu->key('admin-user')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.admin-user')
                ->route('admin.admin-user.index');
        });

        $userMenu->subMenu('user-group', function (MenuItem $menu) {
            $menu->key('user-group')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.user-group')
                ->route('admin.user-group.index');
        });



        /****** ORDER MENUS *******/
        $orderMenu = Menu::make('order', function (MenuItem $menu) {
            $menu->label('avored-admin::system.admin-menus.order')
                ->type(MenuItem::ADMIN)
                ->icon('/vendor/avored/images/icons/icon-currency-dollar.svg')
                ->route('#');
        })->get('order');

        $orderMenu->subMenu('order', function (MenuItem $menu) {
            $menu->key('order')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.order')
                ->route('admin.order.index');
        });
        $orderMenu->subMenu('order-status', function (MenuItem $menu) {
            $menu->key('order-status')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.order-status')
                ->route('admin.order-status.index');
        });



        /****** SYSTEM MENUs *******/
        $systemMenu = Menu::make('system', function (MenuItem $menu) {
            $menu->label('avored-admin::system.admin-menus.system')
                ->type(MenuItem::ADMIN)
                ->icon('/vendor/avored/images/icons/icon-cog.svg')
                ->route('#');
        })->get('system');

        $systemMenu->subMenu('configuration', function (MenuItem $menu) {
            $menu->key('configuration')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.configuration')
                ->route('admin.configuration.index');
        });

        $systemMenu->subMenu('role', function (MenuItem $menu) {
            $menu->key('role')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.role')
                ->route('admin.role.index');
        });

        $systemMenu->subMenu('language', function (MenuItem $menu) {
            $menu->key('language')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.language')
                ->route('admin.language.index');
        });
        $systemMenu->subMenu('currency', function (MenuItem $menu) {
            $menu->key('currency')
                ->type(MenuItem::ADMIN)
                ->label('avored-admin::system.admin-menus.currency')
                ->route('admin.currency.index');
        });
       

        Menu::make('cart', function (MenuItem $menu) {
            $menu->label('Cart')
                ->type(MenuItem::FRONT)
                ->route('avored.cart.show');
        });
        Menu::make('checkout', function (MenuItem $menu) {
            $menu->label('Checkout')
                ->type(MenuItem::FRONT)
                ->route('avored.checkout.show');
        });

    }
}
