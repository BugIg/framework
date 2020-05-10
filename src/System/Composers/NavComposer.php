<?php

namespace AvoRed\Framework\System\Composers;

use AvoRed\Framework\Cms\Models\Menu;
use Illuminate\View\View;

class NavComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $menu = Menu::whereIdentifier('main-menu')->first();
        $menus = json_decode($menu->menu_tree, true);
       
        $view->with('menus', $menus);
    }
}
