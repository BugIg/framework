<?php
namespace AvoRed\Framework\Order\DataTable;

use AvoRed\Framework\Support\CoreTable;

class OrderStatusTable extends CoreTable
{
    /**
     * User Group Table Columns
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
            'name' => [
                'key' => 'name',
                'title' => __('avored-admin::system.comms.name'),
                'sortable' => true
            ],
            'is_default' => [
                'key' => 'slug',
                'title' => __('avored-admin::system.comms.is_default')
            ],
            'action' => [
                'key' => 'action',
                'title' => __('avored-admin::system.comms.action'),
                'callable' => function ($model) {
                    return view('avored-admin::order.order-status._action')
                        ->with('model', $model);
                }
            ]
        ];
    }
}
