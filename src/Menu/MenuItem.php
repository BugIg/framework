<?php

namespace AvoRed\Framework\Menu;

use AvoRed\Framework\AdminMenu\AdminMenu;
use AvoRed\Framework\Support\Contracts\MenuInterface;
use Illuminate\Support\Collection;

class MenuItem implements MenuInterface
{
    /**
     * Constant Front.
     * @var string FRONT
     */
    const FRONT = 'front';

    /**
     * Constant Admin.
     * @var string ADMIN
     */
    const ADMIN = 'admin';

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $icon;

    /**
     * @var array
     */
    public $attributes;

    /**
     * @var string
     */
    public $key;

    /**
     * @var string
     */
    public $params;

    /**
     * @var string
     */
    public $routeName;

    /**
     * @var callable $callable
     */
    protected $callback;
    /**
     * @var Collection $subMenu
     */
    public $subMenu;

    /**
     *  AvoRed Front Menu Construct method.
     * @param $callable
     */
    public function __construct($callable)
    {
        $this->callback = $callable;
        $callable($this);
    }

    /**
     * Get/Set Admin Menu Label.
     * @param null $label
     * @return Menu|string
     */
    public function label($label = null)
    {
        if (null !== $label) {
            $this->label = $label;

            return $this;
        }

        return trans($this->label);
    }

    /**
     * Get/Set Admin Menu Type.
     * @param null $type
     * @return mixed
     */
    public function type($type = null)
    {
        if (null !== $type) {
            $this->type = $type;

            return $this;
        }

        return $this->type;
    }

    /**
     * Get/Set Admin Menu Identifier.
     * @param null $key
     * @return Menu|string
     */
    public function key($key = null)
    {
        if (null !== $key) {
            $this->key = $key;

            return $this;
        }

        return $this->key;
    }

    /**
     * Get/Set Admin Menu Route Name.
     * @param null $routeName
     * @return Menu|string
     */
    public function route($routeName = null)
    {
        if (null !== $routeName) {
            $this->routeName = $routeName;

            return $this;
        }

        return $this->routeName;
    }

    /**
     * Get/Set Admin Menu Route Params Name.
     * @param null $params
     * @return Menu|string
     */
    public function params($params = null)
    {
        if (null !== $params) {
            $this->params = $params;

            return $this;
        }

        return $this->params;
    }

    /**
     * Get/Set Admin Menu Icon.
     * @param null $icon
     * @return Menu|string
     */
    public function icon($icon = null)
    {
        if (null !== $icon) {
            $this->icon = $icon;

            return $this;
        }

        return $this->icon;
    }

    /**
     * Get/Set Admin Menu Icon.
     * @param null $attributes
     * @return Menu|string
     */
    public function attributes($attributes = null)
    {
        if (null !== $attributes) {
            $this->attributes = $attributes;

            return $this;
        }

        return $this->attributes;
    }

    /**
     * Get/Set Admin Menu Sub Menu.
     * @param null|string $key
     * @param mixed $menuItem
     * @return AdminMenu
     */
    public function subMenu($key = null, $menuItem = null)
    {
        if (null === $menuItem) {
            return $this->subMenu;
        }
        $menu = new self($menuItem);
        if (!$this->hasSubMenu()) {
            $this->subMenu = collect();
        }
        $this->subMenu->put($key, $menu);

        return $this;
    }

    /**
     * To check if a menu has submenu or not.
     * @return bool
     */
    public function hasSubMenu()
    {
        if (isset($this->subMenu) && count($this->subMenu) > 0) {
            return true;
        }

        return false;
    }
}
