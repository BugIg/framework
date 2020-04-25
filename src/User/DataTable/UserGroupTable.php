<?php
namespace AvoRed\Framework\User\DataTable;

use AvoRed\Framework\Support\CoreTable;

class UserGroupTable extends CoreTable
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
                'title' => __('avored::system.comms.id'),
                'sortable' => true
            ],
            'name' => [
                'key' => 'name',
                'title' => __('avored::system.comms.name'),
                'sortable' => true
            ],
            'description' => [
                'key' => 'slug',
                'title' => __('avored::system.comms.description')
            ],
            'action' => [
                'key' => 'action',
                'title' => __('avored::system.comms.action'),
                'callable' => function ($model) {
                    return view('avored::user.user-group._action')
                        ->with('model', $model);
                }
            ]
        ];
    }
}
