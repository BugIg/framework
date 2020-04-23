<?php
namespace AvoRed\Framework\System\DataTable;

use AvoRed\Framework\Support\CoreTable;

class CurrencyTable extends CoreTable
{

    public function getColumns()
    {
        return [
            'id' => [
                'key' => 'id',
                'title' => __('avored::system.comms.id'),
                'sortable' => true
            ],
            'name' => [
                'key' => 'name',
                'title' => __('avored::system.comms.name'),
                'sortable' => true
            ],
            'code' => [
                'key' => 'code',
                'title' => __('avored::system.comms.code')
            ],
            'symbol' => [
                'key' => 'is_default',
                'title' => __('avored::system.comms.symbol')
            ],
            'conversation_rate' => [
                'key' => 'conversation_rate',
                'title' => __('avored::system.comms.conversation_rate')
            ],
            'status' => [
                'key' => 'status',
                'title' => __('avored::system.comms.status')
            ],
            'action' => [
                'key' => 'action',
                'title' => __('avored::system.comms.action'),
                'callable' => function ($model) {
                    return view('avored::system.currency._action')
                        ->with('model', $model);
                }
            ]
        ];
    }
}
