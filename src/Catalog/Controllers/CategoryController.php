<?php

namespace AvoRed\Framework\Catalog\Controllers;

use AvoRed\Framework\Catalog\Models\Category;
use AvoRed\Framework\Support\Facades\Tab;
use Illuminate\Http\Request;
use AvoRed\Framework\System\Controllers\BaseController;
use Illuminate\Http\Response;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
     * @return Response
     */
    public function create()
    {
        $tabs = Tab::get('catalog.category');

        return view('avored::catalog.category.create')
            ->with('tabs', $tabs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index');

    }

    private function getColumns()
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
            'slug' => [
                'key' => 'slug',
                'title' => __('avored::system.comms.slug')
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
