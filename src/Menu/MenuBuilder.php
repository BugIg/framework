<?php

namespace AvoRed\Framework\Menu;

use stdClass;
use Illuminate\Support\Collection;

class MenuBuilder
{
    /**
     * Front Menu Collection.
     * @var \Illuminate\Support\Collection
     */
    protected $collection;

    /**
     * Construct for the menu builder.
     */
    public function __construct()
    {
        $this->collection = Collection::make([]);
    }

    /**
     * Make a Front End Menu an Object.
     * @param string $key
     * @param callable $callable
     * @return self
     */
    public function make($key, callable $callable)
    {
        $menu = new MenuItem($callable);
        $menu->key($key);
        $this->collection->put($key, $menu);

        return $this;
    }

    /**
     * Return Menu Object.
     * @var string
     * @return \AvoRed\Framework\Menu\Menu
     */
    public function get($key)
    {
        return $this->collection->get($key);
    }

    /**
     * Return Menu Object.
     * @var string
     * @return \AvoRed\Framework\Menu\Menu
     */
    public function getMenuItem($key)
    {
        
        return $this->collection->get($key);
        return $this->collection->first(function($menu)  use ($key) {

            if ($menu->hasSubMenu()) {
                foreach ($menu->subMenu($menu->key()) as $subMenu) {
                  
                   return $subMenu->key() == $key; 
                }
            }
        });
    }

    /**
     * Return all available Menu in Menu.
     * @param void
     * @return \Illuminate\Support\Collection
     */
    public function all($admin = false)
    {
        if ($admin) {
            return $this->collection->filter(function ($item) {
                return $item->type() === MenuItem::ADMIN;
            });
        } else {
            return $this->collection->filter(function ($item) {
                return $item->type() === MenuItem::FRONT;
            });
        }
    }

    /**
     * @param $name
     * @return array
     */
    public function getMenuItemFromRouteName($name)
    {
        $currentOpenKey = '';
        $currentMenuItemKey = '';
        foreach ($this->collection as $key => $menuGroup) {
            if ($menuGroup->hasSubMenu()) {
                $subMenus = $menuGroup->subMenu($key);

                foreach($subMenus as $subKey => $subMenu) {
                    if ($subMenu->route() == $name) {
                        $currentOpenKey = $key;
                        $currentMenuItemKey = $subMenu->key();
                    }
                }
            }
        }

        return [$currentOpenKey, $currentMenuItemKey];
    }

    /**
     * Return all available Menu in Menu.
     * @param void
     * @return \Illuminate\Support\Collection
     */
    public function frontMenus()
    {
        $frontMenus = collect();

        $i = 1;
        foreach ($this->collection as $item) {
            if ($item->type() === MenuItem::FRONT) {
                $menu = new stdClass;
                $menu->id = $i;
                $menu->name = $item->label;
                $menu->key = $item->key();
                $menu->route = $item->route();
                $menu->params = $item->params();
                $menu->url = route($item->route(), $item->params());
                $menu->submenus = $item->submenus ?? [];
                $frontMenus->push($menu);
                $i++;
            }
        }

        return $frontMenus;
    }
}
