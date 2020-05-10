<?php
namespace AvoRed\Framework\Cms\DataTable;

use AvoRed\Framework\Support\CoreTable;

class MenuTable extends CoreTable
{
    /**
     * Menu Table Columns
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
            'action' => [
                'key' => 'action',
                'title' => __('avored-admin::system.comms.action'),
                'callable' => function ($model) {
                    return view('avored-admin::cms.menu._action')
                        ->with('model', $model);
                }
            ]
        ];
    }
}
