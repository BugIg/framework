<?php
namespace AvoRed\Framework\Order\DataTable;

use AvoRed\Framework\Support\CoreTable;

class OrderTable extends CoreTable
{
    /**
     * Order Table Columns
     * @return array[]
     */
    public function getColumns()
    {
        return [
            'id' => [
                'key' => 'id',
                'title' => __('avored-admin::system.comms.id'),
                'sortable' => true
            ],
            'payment_option' => [
                'key' => 'payment_option',
                'title' => __('avored-admin::system.comms.payment_option'),
            ],
           
            'shipping_option' => [
                'key' => 'shipping_option',
                'title' => __('avored-admin::system.comms.shipping_option'),
            ],
           
            'action' => [
                'key' => 'action',
                'title' => __('avored-admin::system.comms.action'),
                'callable' => function ($model) {
                    return view('avored-admin::order.order._action')
                        ->with('model', $model);
                }
            ]
        ];
    }
}
