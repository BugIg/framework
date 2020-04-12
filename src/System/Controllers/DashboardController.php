<?php

namespace AvoRed\Framework\System\Controllers;

//use AvoRed\Framework\Support\Facades\Widget;

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

        $orderWidget = ''; // Widget::get('avored-total-order');
        $customerWidget =  ''; //Widget::get('avored-total-customer');
        $revenueWidget = ''; //Widget::get('avored-total-revenue');
//
        return view('avored::system.dashboard')
            ->with('user', $user);
    }
}
