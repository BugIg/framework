<?php
namespace AvoRed\Framework\User\DataTable;

use AvoRed\Framework\Support\CoreTable;

class AdminUserTable extends CoreTable
{
    /**
     * Admin User Table Columns
     * @return array[]
     */
    public function getColumns()
    {
        return [
            'id' => [
                'key' => 'id',
                'title' => __('avored::system.comms.id'),
                'sortable' => true
            ],
            'first_name' => [
                'key' => 'first_name',
                'title' => __('avored::system.comms.name'),
                'sortable' => true
            ],
            'last_name' => [
                'key' => 'last_name',
                'title' => __('avored::system.comms.name'),
                'sortable' => true
            ],
            'email' => [
                'key' => 'email',
                'title' => __('avored::system.comms.name'),
                'sortable' => true
            ],
            'action' => [
                'key' => 'action',
                'title' => __('avored::system.comms.action'),
                'callable' => function ($model) {
                    return view('avored::user.admin-user._action')
                        ->with('model', $model);
                }
            ]
        ];
    }
}
