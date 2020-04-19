<?php
namespace AvoRed\Framework\User\DataTable;

use AvoRed\Framework\Support\CoreTable;

class RoleTable extends CoreTable
{

    public function getColumns()
    {
        return [
            'id' => [
                'key' => 'id',
                'title' => __('avored::system.comms.id')
            ],
            'name' => [
                'key' => 'name',
                'title' => __('avored::system.comms.name')
            ],
            'description' => [
                'key' => 'slug',
                'title' => __('avored::system.comms.description')
            ],
            'action' => [
                'key' => 'action',
                'title' => __('avored::system.comms.action'),
                'callable' => function ($model) {
                    return view('avored::user.role._action')
                        ->with('model', $model);
                }
            ]
        ];
    }
}
