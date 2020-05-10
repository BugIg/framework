<?php
namespace AvoRed\Framework\Cms\DataTable;

use AvoRed\Framework\Support\CoreTable;

class PageTable extends CoreTable
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
            'slug' => [
                'key' => 'slug',
                'title' => __('avored-admin::system.comms.slug'),
                'sortable' => true
            ],
            'meta_title' => [
                'key' => 'meta_title',
                'title' => __('avored-admin::system.comms.meta-title')
            ],
            'action' => [
                'key' => 'action',
                'title' => __('avored-admin::system.comms.action'),
                'callable' => function ($model) {
                    return view('avored-admin::cms.page._action')
                        ->with('model', $model);
                }
            ]
        ];
    }
}
