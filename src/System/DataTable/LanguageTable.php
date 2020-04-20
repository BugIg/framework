<?php
namespace AvoRed\Framework\System\DataTable;

use AvoRed\Framework\Support\CoreTable;

class LanguageTable extends CoreTable
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
            'is_default' => [
                'key' => 'is_default',
                'title' => __('avored::system.comms.is_default')
            ],
            'action' => [
                'key' => 'action',
                'title' => __('avored::system.comms.action'),
                'callable' => function ($model) {
                    return view('avored::system.language._action')
                        ->with('model', $model);
                }
            ]
        ];
    }
}
