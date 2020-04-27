<?php
namespace AvoRed\Framework\Tests\Functional;

use AvoRed\Framework\Tab\Manager;
use AvoRed\Framework\Tab\TabItem;
use AvoRed\Framework\Tests\BaseTestCase;
use Illuminate\Support\Collection;

class TabFunctionalTest extends BaseTestCase
{
    /** @test **/
    public function test_tab_instance_check()
    {
        $manager = new Manager();
        $tab = $manager->put('test_tab_key', function ($tab) {
            $tab->key('tab_item_key');
        })->get('test_tab_key');

        $this->assertInstanceOf(Collection::class, $tab);
    }

    /** @test **/
    public function test_tab_item_instance_check()
    {
        $manager = new Manager();
        $tabs = $manager->put('test_tab_key', function ($tab) {
            $tab->key('tab_item_key');
        })->get('test_tab_key');

        foreach ($tabs as $tab) {
            $this->assertInstanceOf(TabItem::class, $tab);
        }
    }

    /** @test **/
    public function test_tab_manager_all_method()
    {
        $manager = new Manager();
        $tabCollection = $manager->put('test_tab_key', function ($tab) {
            $tab->key('tab_item_key');
        })->all();

        foreach ($tabCollection as $tabs) {
            $this->assertInstanceOf(Collection::class, $tabs);
            foreach ($tabs as $tab) {
                $this->assertInstanceOf(TabItem::class, $tab);
            }
        }
    }

    /** @test **/
    public function test_tab_item_key_method()
    {
        $manager = new Manager();
        $tabItem = $manager->put('test_tab_key', function ($tab) {
            $tab->key('tab_item_key');
        })->get('test_tab_key')->first();
        $this->assertEquals('tab_item_key', $tabItem->key());
    }

    /** @test **/
    public function test_tab_item_label_method()
    {
        $manager = new Manager();
        $tabItem = $manager->put('test_tab_key', function ($tab) {
            $tab->key('tab_item_key')
                ->label('test label for tab item');
        })->get('test_tab_key')->first();
        $this->assertEquals('test label for tab item', $tabItem->label());
    }

    /** @test **/
    public function test_tab_item_desc_method()
    {
        $manager = new Manager();
        $tabItem = $manager->put('test_tab_key', function ($tab) {
            $tab->key('tab_item_key')
                ->description('test desc for tab item');
        })->get('test_tab_key')->first();
        $this->assertEquals('test desc for tab item', $tabItem->description());
    }

    /** @test **/
    public function test_tab_item_view_method()
    {
        $manager = new Manager();
        $tabItem = $manager->put('test_tab_key', function ($tab) {
            $tab->key('tab_item_key')
                ->view('avored::test.view.path');
        })->get('test_tab_key')->first();
        $this->assertEquals('avored::test.view.path', $tabItem->view());
    }
}
