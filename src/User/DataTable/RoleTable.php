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
                'title' => __('avored-admin::system.comms.id'),
                'sortable' => true
            ],
            'name' => [
                'key' => 'name',
                'title' => __('avored-admin::system.comms.name'),
                'sortable' => true
            ],
            'description' => [
                'key' => 'slug',
                'title' => __('avored-admin::system.comms.description')
            ],
            'action' => [
                'key' => 'action',
                'title' => __('avored-admin::system.comms.action'),
                'callable' => function ($model) {
                    return view('avored-admin::user.role._action')
                        ->with('model', $model);
                }
            ]
        ];
    }
}
