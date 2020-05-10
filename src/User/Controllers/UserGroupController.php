<?php

namespace AvoRed\Framework\User\Controllers;

use AvoRed\Framework\User\DataTable\UserGroupTable;
use AvoRed\Framework\System\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use AvoRed\Framework\Support\Facades\Tab;
use AvoRed\Framework\User\Models\UserGroup;
use AvoRed\Framework\User\Requests\UserGroupRequest;
use Illuminate\View\View;

class UserGroupController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $userGroupTable = new UserGroupTable(UserGroup::class);

        return view('avored-admin::user.user-group.index')
            ->with('userGroupTable', $userGroupTable);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        $tabs = Tab::get('user.user-group');

        return view('avored-admin::user.user-group.create')
            ->with('tabs', $tabs);
    }

    /**
     * Store a newly created resource in storage.
     * @param UserGroupRequest $request
     * @return RedirectResponse
     */
    public function store(UserGroupRequest $request)
    {
        $userGroup = UserGroup::create($request->all());

        return redirect()->route('admin.user-group.index')
            ->with('successNotification', __('avored-admin::system.notification.store', ['attribute' => 'UserGroup']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param UserGroup $userGroup
     * @return View
     */
    public function edit(UserGroup $userGroup)
    {
        $tabs = Tab::get('user.user-group');

        return view('avored-admin::user.user-group.edit')
            ->with('userGroup', $userGroup)
            ->with('tabs', $tabs);
    }

    /**
     * Update the specified resource in storage.
     * @param UserGroupRequest $request
     * @param UserGroup $userGroup
     * @return RedirectResponse
     */
    public function update(UserGroupRequest $request, UserGroup $userGroup)
    {
        $userGroup->update($request->all());

        return redirect()->route('admin.user-group.index')
            ->with('successNotification', __('avored-admin::system.notification.updated', ['attribute' => 'UserGroup']));
    }

    /**
     * Remove the specified resource from storage.
     * @param UserGroup $userGroup
     * @return JsonResponse
     */
    public function destroy(UserGroup $userGroup)
    {
        $userGroup->delete();

        return redirect()
            ->route('admin.user-group.index');
    }

}
