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
        $this->app->alias('menu', AvoRed\Framework\Menu\MenuBuilder::class);
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
        $catalogMenu = Menu::make('catalog', function (MenuItem $menu) {
            $menu->label('avored::system.admin-menus.catalog')
                ->type(MenuItem::ADMIN)
                ->icon('/vendor/avored/images/icons/shopping-cart.svg')
                ->route('#');
        })->get('catalog');

        $catalogMenu->subMenu('category', function (MenuItem $menu) {
            $menu->key('category')
                ->type(MenuItem::ADMIN)
                ->label('avored::system.admin-menus.category')
                ->route('admin.category.index');
        });

        $systemMenu = Menu::make('system', function (MenuItem $menu) {
            $menu->label('avored::system.admin-menus.system')
                ->type(MenuItem::ADMIN)
                ->icon('/vendor/avored/images/icons/shopping-cart.svg')
                ->route('#');
        })->get('system');

        $systemMenu->subMenu('role', function (MenuItem $menu) {
            $menu->key('role')
                ->type(MenuItem::ADMIN)
                ->label('avored::system.admin-menus.role')
                ->route('admin.role.index');
        });

        $systemMenu->subMenu('language', function (MenuItem $menu) {
            $menu->key('language')
                ->type(MenuItem::ADMIN)
                ->label('avored::system.admin-menus.language')
                ->route('admin.language.index');
        });


//        $catalogMenu->subMenu('product', function (MenuItem $menu) {
//            $menu->key('product')
//                ->type(MenuItem::ADMIN)
//                ->label('avored::system.admin-menus.product')
//                ->route('admin.product.index');
//        });
//
//        $cmsMenu = Menu::make('cms', function (MenuItem $menu) {
//            $menu->label('avored::system.admin-menus.cms')
//                ->type(MenuItem::ADMIN)
//                ->icon('/vendor/avored/images/icons/color-palette.svg')
//                ->route('#');
//        })->get('cms');
//
//        $cmsMenu->subMenu('menu-group', function (MenuItem $menu) {
//            $menu->key('menu-group')
//                ->type(MenuItem::ADMIN)
//                ->label('avored::system.admin-menus.menu')
//                ->route('admin.menu-group.index');
//        });

    }
}
