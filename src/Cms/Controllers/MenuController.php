<?php
namespace AvoRed\Framework\Cms\Controllers;

use AvoRed\Framework\Cms\DataTable\MenuTable;
use AvoRed\Framework\Cms\Models\Menu;
use AvoRed\Framework\Support\Facades\Tab;
use AvoRed\Framework\System\Controllers\BaseController;

class MenuController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $menuTable = new MenuTable(Menu::class);

        return view('avored::cms.menu.index')
            ->with('menuTable', $menuTable);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        $tabs = Tab::get('cms.menu');

        return view('avored::cms.menu.create')
            ->with('tabs', $tabs);
    }
//
//    /**
//     * Store a newly created resource in storage.
//     * @param MenuRequest $request
//     * @return RedirectResponse
//     */
//    public function store(MenuRequest $request)
//    {
//        $menu = Menu::create($request->all());
//
//        return redirect()->route('admin.menu.index')
//            ->with('successNotification', __('avored::system.notification.store', ['attribute' => 'Menu']));
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     * @param Menu $menu
//     * @return View
//     */
//    public function edit(Menu $menu)
//    {
//        $tabs = Tab::get('cms.menu');
//
//        return view('avored::cms.menu.edit')
//            ->with('userGroup', $menu)
//            ->with('tabs', $tabs);
//    }
//
//    /**
//     * Update the specified resource in storage.
//     * @param MenuRequest $request
//     * @param Menu $menu
//     * @return RedirectResponse
//     */
//    public function update(MenuRequest $request, Menu $menu)
//    {
//        $menu->update($request->all());
//
//        return redirect()->route('admin.menu.index')
//            ->with('successNotification', __('avored::system.notification.updated', ['attribute' => 'Menu']));
//    }
//
    /**
     * Remove the specified resource from storage.
     * @param Menu $menu
     * @return JsonResponse
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()
            ->route('admin.menu.index');
    }
}
