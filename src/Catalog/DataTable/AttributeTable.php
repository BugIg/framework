<?php
namespace AvoRed\Framework\Catalog\DataTable;

use AvoRed\Framework\Support\CoreTable;

class AttributeTable extends CoreTable
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
            'action' => [
                'key' => 'action',
                'title' => __('avored::system.comms.action'),
                'callable' => function ($model) {
                    return view('avored::catalog.attribute._action')
                        ->with('model', $model);
                }
            ]
        ];
    }
}
