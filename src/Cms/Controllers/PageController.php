<?php

namespace AvoRed\Framework\Cms\Controllers;

use AvoRed\Framework\Cms\DataTable\PageTable;
use AvoRed\Framework\Cms\Models\Page;
use AvoRed\Framework\Cms\Requests\PageRequest;
use AvoRed\Framework\Support\Facades\Tab;
use Illuminate\Http\Request;
use AvoRed\Framework\System\Controllers\BaseController;
use Illuminate\Http\Response;

class PageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pageTable = new PageTable(Page::class);

        return view('avored-admin::cms.page.index')
            ->with('pageTable', $pageTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tabs = Tab::get('cms.page');

        return view('avored-admin::cms.page.create')
            ->with('tabs', $tabs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request
     * @return Response
     */
    public function store(PageRequest $request)
    {
        Page::create($request->all());

        return redirect()->route('admin.page.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Page $page)
    {
        $tabs = Tab::get('cms.page');

        return view('avored-admin::cms.page.edit')
            ->with('page', $page)
            ->with('tabs', $tabs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Page $page
     * @return Response
     */
    public function update(Request $request, Page $page)
    {
        $page->update($request->all());

        return redirect()->route('admin.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return Response
     * @throws \Exception
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.page.index');

    }
}
