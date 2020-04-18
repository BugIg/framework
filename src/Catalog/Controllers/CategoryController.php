<?php

namespace AvoRed\Framework\Catalog\Controllers;

use AvoRed\Framework\Catalog\Models\Category;
use Illuminate\Http\Request;
use AvoRed\Framework\System\Controllers\BaseController;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        $columns = $this->getColumns();

        return view('avored::catalog.category.index')
            ->with('categories', $categories)
            ->with('columns', $columns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    private function getColumns()
    {
        return [
            'id' => [
                'key' => 'id',
                'title' => __('avored::catalog.category.id')
            ],
           'name' => [
               'key' => 'name',
                'title' => __('avored::catalog.category.name')
           ],
            'slug' => [
                'key' => 'slug',
                'title' => __('avored::catalog.category.slug')
            ],
            'meta_title' => [
                'key' => 'meta_title',
                'title' => __('avored::catalog.category.meta-title')
            ],
            'action' => [
                'key' => 'action',
                'title' => __('avored::catalog.category.action'),
                'callable' => function ($model) {
                    return '
                        <a href="' . route('admin.category.edit', $model->id) . '">' .
                            __('avored::system.action.edit') . '
                        </a>
                        <a
                            href="' . route('admin.category.destroy', $model->id) . '"
                            onclick="event.preventDefault();document.getElementById(\'admin-category-destroy-' . $model->id . '\').submit();"
                        >' .
                            __('avored::system.action.destroy') . '
                        </a>
                        <form id="admin-category-destroy-' . $model->id . '"
                            action="' . route('admin.category.destroy', $model->id) . '" method="POST"  class="hidden">
                            <input type="hidden" name="_token" value="'. csrf_token() . '" />
                            <input type="hidden" name="_method" value="delete" />
                        </form>
                    ';

                }
            ]
        ];
    }
}
