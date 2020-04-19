<?php
namespace AvoRed\Framework\Catalog\DataTable;

use AvoRed\Framework\Support\CoreTable;

class CategoryTable extends CoreTable
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
            'slug' => [
                'key' => 'slug',
                'title' => __('avored::system.comms.slug'),
                'sortable' => true
            ],
            'meta_title' => [
                'key' => 'meta_title',
                'title' => __('avored::system.comms.meta-title')
            ],
            'action' => [
                'key' => 'action',
                'title' => __('avored::system.comms.action'),
                'callable' => function ($model) {
                    return view('avored::catalog.category._action')
                        ->with('model', $model);
                }
            ]
        ];
    }
}
