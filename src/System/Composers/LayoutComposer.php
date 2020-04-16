<?php

namespace AvoRed\Framework\System\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use AvoRed\Framework\Support\Facades\Menu;
use Illuminate\Support\Facades\Route;

class LayoutComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = Auth::guard('admin')->user();
        $routeName = Route::currentRouteName();
        [$currentOpenKey, $currentMenuItemKey] = Menu::getMenuItemFromRouteName($routeName);
        $adminMenus = Menu::all($admin = true);

//        dd($currentMenuItemKey, $currentOpenKey);

        $view->with('menus', $adminMenus)
//            ->with('currentOpenKey', $currentOpenKey)
//            ->with('currentMenuItemKey', $currentMenuItemKey)
            ->with('user', $user);
    }
}
