<?php

namespace AvoRed\Framework\Order\Controllers;

use AvoRed\Framework\Order\DataTable\OrderTable;
use AvoRed\Framework\System\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use AvoRed\Framework\Order\Models\Order;
use Illuminate\View\View;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $orderTable = new OrderTable(Order::class);

        return view('avored-admin::order.order.index')
            ->with('orderTable', $orderTable);
    }


    /**
     * Remove the specified resource from storage.
     * @param Order $orderS
     * @return JsonResponse
     */
    public function show(Order $order)
    {
        
        return view('avored-admin::order.order.show')
            ->with('order', $order);
    }

}
