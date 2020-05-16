<?php

namespace AvoRed\Framework\System\Controllers;

//use AvoRed\Framework\Support\Facades\Widget;

use AvoRed\Framework\Support\Facades\Menu;
use AvoRed\Framework\Support\Facades\Widget;
use Illuminate\Support\Facades\Auth;

class DashboardController extends  BaseController
{
    /**
     * Show Dashboard of an AvoRed Admin.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::guard('admin')->user();

        $orderWidget = Widget::get('avored-total-order');
        $customerWidget =  Widget::get('avored-total-customer');
        $revenueWidget = Widget::get('avored-total-revenue');
        $menus = Menu::all($admin = true);
        
        return view('avored-admin::system.dashboard')
            ->with('user', $user)
            ->with('menus', $menus)
            ->with('orderWidget', $orderWidget)
            ->with('customerWidget', $customerWidget)
            ->with('revenueWidget', $revenueWidget)
            ;
    }
}
