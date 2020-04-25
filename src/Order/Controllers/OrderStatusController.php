<?php

namespace AvoRed\Framework\Order\Controllers;

use AvoRed\Framework\Order\DataTable\OrderStatusTable;
use AvoRed\Framework\System\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use AvoRed\Framework\Support\Facades\Tab;
use AvoRed\Framework\Order\Models\OrderStatus;
use AvoRed\Framework\Order\Requests\OrderStatusRequest;
use Illuminate\View\View;

class OrderStatusController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $orderStatusTable = new OrderStatusTable(OrderStatus::class);

        return view('avored::order.order-status.index')
            ->with('orderStatusTable', $orderStatusTable);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        $tabs = Tab::get('order.order-status');

        return view('avored::order.order-status.create')
            ->with('tabs', $tabs);
    }

    /**
     * Store a newly created resource in storage.
     * @param OrderStatusRequest $request
     * @return RedirectResponse
     */
    public function store(OrderStatusRequest $request)
    {
        $orderStatus = OrderStatus::create($request->all());

        return redirect()->route('admin.order-status.index')
            ->with('successNotification', __('avored::system.notification.store', ['attribute' => 'OrderStatus']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param OrderStatus $orderStatus
     * @return View
     */
    public function edit(OrderStatus $orderStatus)
    {
        $tabs = Tab::get('order.order-status');

        return view('avored::order.order-status.edit')
            ->with('orderStatus', $orderStatus)
            ->with('tabs', $tabs);
    }

    /**
     * Update the specified resource in storage.
     * @param OrderStatusRequest $request
     * @param OrderStatus $orderStatus
     * @return RedirectResponse
     */
    public function update(OrderStatusRequest $request, OrderStatus $orderStatus)
    {
        $orderStatus->update($request->all());

        return redirect()->route('admin.order-status.index')
            ->with('successNotification', __('avored::system.notification.updated', ['attribute' => 'OrderStatus']));
    }

    /**
     * Remove the specified resource from storage.
     * @param OrderStatus $orderStatus
     * @return JsonResponse
     */
    public function destroy(OrderStatus $orderStatus)
    {
        $orderStatus->delete();

        return redirect()
            ->route('admin.order-status.index');
    }

}
