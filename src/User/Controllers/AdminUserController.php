<?php

namespace AvoRed\Framework\User\Controllers;

use AvoRed\Framework\System\Models\Country;
use AvoRed\Framework\System\Models\Currency;
use AvoRed\Framework\User\DataTable\AdminUserTable;
use AvoRed\Framework\System\Controllers\BaseController;
use AvoRed\Framework\User\Models\Permission;
use AvoRed\Framework\User\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use AvoRed\Framework\Support\Facades\Tab;
use AvoRed\Framework\User\Models\AdminUser;
use AvoRed\Framework\Support\Facades\Permission as PermissionFacade;
use AvoRed\Framework\System\Models\Media;
use AvoRed\Framework\User\Requests\AdminUserRequest;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class AdminUserController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $adminUserTable = new AdminUserTable(AdminUser::class);

        return view('avored::user.admin-user.index')
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
        $countries = Country::all();;

        return view('avored::user.admin-user.create')
            ->with('tabs', $tabs)
            ->with('roleOptions', $roleOptions)
            ->with('countries', $countries);
    }

    /**
     * Store a newly created resource in storage.
     * @param AdminUserRequest $request
     * @return RedirectResponse
     */
    public function store(AdminUserRequest $request)
    {
        AdminUser::create($request->all());

        return redirect()->route('admin.admin-user.index')
            ->with('successNotification', __('avored::system.notification.store', ['attribute' => 'AdminUser']));
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
        $countries = Country::all();
        $adminUser->load('media');

        return view('avored::user.admin-user.edit')
            ->with('adminUser', $adminUser)
            ->with('tabs', $tabs)
            ->with('roleOptions', $roleOptions)
            ->with('countries', $countries);
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
        $mediaId = Arr::get($request->get('media'), '0', null);
        
        if ($mediaId !== null && $adminUser->media->id !== $mediaId) {
            $media = Media::find($mediaId);
            $media->owner()->associate($adminUser)->save();
        }
        

        return redirect()->route('admin.admin-user.index')
            ->with('successNotification', __('avored::system.notification.updated', ['attribute' => 'AdminUser']));
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
