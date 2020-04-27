<?php
namespace AvoRed\Framework\Tests\Functional;

use AvoRed\Framework\Menu\MenuBuilder;
use AvoRed\Framework\Menu\MenuItem;
use AvoRed\Framework\Tests\BaseTestCase;
use Illuminate\Support\Collection;

class MenuFunctionalTest extends BaseTestCase
{
    /** @test **/
    public function test_menu_item_instance_check()
    {
        $builder = new MenuBuilder();
        $testMenu = $builder->make('test_menu_key', function ($menu) {
            $menu->label('test menu');
        })->get('test_menu_key');

        $this->assertInstanceOf(MenuItem::class, $testMenu);
    }

    /** @test **/
    public function test_menu_builder_all_front_end_menus()
    {
        $builder = new MenuBuilder();
        $menuCollection = $builder->make('test_menu_key', function ($menu) {
            $menu->key('menu_item_key')
                ->type(MenuItem::FRONT);
        })->all();

        foreach ($menuCollection as $menu) {
            $this->assertInstanceOf(MenuItem::class, $menu);
            $this->assertEquals(MenuItem::FRONT, $menu->type());
        }
    }

    /** @test **/
    public function test_menu_builder_all_admin_end_menus()
    {
        $builder = new MenuBuilder();
        $menuCollection = $builder->make('test_menu_key', function ($menu) {
            $menu->key('menu_item_key')
                ->type(MenuItem::ADMIN);
        })->all(true);

        foreach ($menuCollection as $menu) {
            $this->assertInstanceOf(MenuItem::class, $menu);
            $this->assertEquals(MenuItem::ADMIN, $menu->type());
        }
    }

    /** @test **/
    public function test_menu_builder_get_menu_item_from_route_name_method()
    {
        $builder = new MenuBuilder();
        $parentMenu = $builder->make('test_menu_key', function ($menu) {
            $menu->key('menu_item_key')
                ->route('#')
                ->type(MenuItem::ADMIN);
        })->get('test_menu_key');

        $parentMenu->subMenu('test_sub_menu_key', function ($menu) {
            $menu->key('sub_menu_item_key')
                ->route('test_route_name')
                ->type(MenuItem::ADMIN);
        });

        [$currentOpenKey, $currentMenuItemKey] = $builder->getMenuItemFromRouteName('test_route_name');

        $this->assertEquals('test_menu_key', $currentOpenKey);
        $this->assertEquals('sub_menu_item_key', $currentMenuItemKey);
    }

    /** @test **/
    public function test_menu_item_key_method()
    {
        $builder = new MenuBuilder();
        $menuItem = $builder->make('test_menu_key', function ($menu) {
            $menu->key('menu_item_key');
        })->get('test_menu_key');

        $this->assertEquals('test_menu_key', $menuItem->key());
    }

    /** @test **/
    public function test_menu_item_label_method()
    {
        $builder = new MenuBuilder();
        $menuItem = $builder->make('test_menu_key', function ($menu) {
            $menu->key('menu_item_key')
                ->label('test label for menu item');
        })->get('test_menu_key');
        $this->assertEquals('test label for menu item', $menuItem->label());
    }

    /** @test **/
    public function test_menu_item_route_method()
    {
        $builder = new MenuBuilder();
        $menuItem = $builder->make('test_menu_key', function ($menu) {
            $menu->key('menu_item_key')
                ->route('avored.admin.route.name');
        })->get('test_menu_key');
        $this->assertEquals('avored.admin.route.name', $menuItem->route());
    }

    /** @test **/
    public function test_menu_item_params_method()
    {
        $builder = new MenuBuilder();
        $menuItem = $builder->make('test_menu_key', function ($menu) {
            $menu->key('menu_item_key')
                ->params(['id' => 5]);
        })->get('test_menu_key');
        $this->assertEquals(['id' => 5], $menuItem->params());
    }

    /** @test **/
    public function test_menu_item_icon_method()
    {
        $builder = new MenuBuilder();
        $menuItem = $builder->make('test_menu_key', function ($menu) {
            $menu->key('menu_item_key')
                ->icon('icon_path');
        })->get('test_menu_key');
        $this->assertEquals('icon_path', $menuItem->icon());
    }

    /** @test **/
    public function test_menu_item_attributes_method()
    {
        $builder = new MenuBuilder();
        $menuItem = $builder->make('test_menu_key', function ($menu) {
            $menu->key('menu_item_key')
                ->attributes(['data-key' => 'test key']);
        })->get('test_menu_key');
        $this->assertEquals(['data-key' => 'test key'], $menuItem->attributes());
    }

    /** @test **/
    public function test_menu_item_submenu_test()
    {
        $builder = new MenuBuilder();
        $parentMenu = $builder->make('test_menu_key', function ($menu) {
            $menu->key('menu_item_key')
                ->route('#')
                ->type(MenuItem::ADMIN);
        })->get('test_menu_key');

        $parentMenu->subMenu('test_sub_menu_key', function ($menu) {
            $menu->key('sub_menu_item_key')
                ->route('test_route_name')
                ->type(MenuItem::ADMIN);
        });

        $this->assertEquals(1, $parentMenu->subMenu->count());
        $this->assertInstanceOf(Collection::class, $parentMenu->subMenu);
    }
}
