<?php

namespace AvoRed\Framework\User\Controllers;

use AvoRed\Framework\System\Models\Country;
use AvoRed\Framework\User\DataTable\AdminUserTable;
use AvoRed\Framework\System\Controllers\BaseController;
use AvoRed\Framework\User\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use AvoRed\Framework\Support\Facades\Tab;
use AvoRed\Framework\Support\Traits\Controller\MediaTrait;
use AvoRed\Framework\User\Models\AdminUser;
use AvoRed\Framework\User\Requests\AdminUserRequest;
use Illuminate\View\View;

class AdminUserController extends BaseController
{
    use MediaTrait;
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $adminUserTable = new AdminUserTable(AdminUser::class);

        return view('avored-admin::user.admin-user.index')
            ->with('adminUserTable', $adminUserTable);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        $tabs = Tab::get('user.admin-user');
        $roleOptions = Role::options('id', 'name');
        $languageOptions = Country::options(
        function ($model) {
            return $model->code . "_" . $model->lang_code;
        }, 
        function ($model) {
            return $model->name . ": " . $model->code;
        });

        return view('avored-admin::user.admin-user.create')
            ->with('tabs', $tabs)
            ->with('roleOptions', $roleOptions)
            ->with('languageOptions', $languageOptions);
    }

    /**
     * Store a newly created resource in storage.
     * @param AdminUserRequest $request
     * @return RedirectResponse
     */
    public function store(AdminUserRequest $request)
    {
        $adminUser = AdminUser::create($request->all());
        $this->mediaSync($adminUser, $adminUser->media, $request->get('media'));

        return redirect()->route('admin.admin-user.index')
            ->with('successNotification', __('avored-admin::system.notification.store', ['attribute' => 'AdminUser']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param AdminUser $adminUser
     * @return View
     */
    public function edit(AdminUser $adminUser)
    {
        $tabs = Tab::get('user.admin-user');
        $roleOptions = Role::options('id', 'name');
        $adminUser->load('media');

        $languageOptions = Country::options(
        function ($model) {
            return $model->code . "_" . $model->lang_code;
        }, 
        function ($model) {
            return $model->name . ": " . $model->code;
        });

        return view('avored-admin::user.admin-user.edit')
            ->with('adminUser', $adminUser)
            ->with('tabs', $tabs)
            ->with('roleOptions', $roleOptions)
            ->with('languageOptions', $languageOptions);
    }

    /**
     * Update the specified resource in storage.
     * @param AdminUserRequest $request
     * @param AdminUser $adminUser
     * @return RedirectResponse
     */
    public function update(AdminUserRequest $request, AdminUser $adminUser)
    {
        $adminUser->update($request->all());
        $this->mediaSync($adminUser, $adminUser->media, $request->get('media'));
        

        return redirect()->route('admin.admin-user.index')
            ->with('successNotification', __('avored-admin::system.notification.updated', ['attribute' => 'AdminUser']));
    }

    /**
     * Remove the specified resource from storage.
     * @param AdminUser $adminUser
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(AdminUser $adminUser)
    {
        $adminUser->delete();

        return redirect()->route('admin.admin-user.index');
    }
}
