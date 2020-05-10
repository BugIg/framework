<?php

namespace AvoRed\Framework\User\Controllers;

use AvoRed\Framework\User\DataTable\RoleTable;
use AvoRed\Framework\System\Controllers\BaseController;
use AvoRed\Framework\User\Models\Permission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use AvoRed\Framework\Support\Facades\Tab;
use AvoRed\Framework\User\Models\Role;
use AvoRed\Framework\Support\Facades\Permission as PermissionFacade;
use AvoRed\Framework\User\Requests\RoleRequest;
use Illuminate\View\View;

class RoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        $roleTable = new RoleTable(Role::class);

        return view('avored-admin::user.role.index')
            ->with('roleTable', $roleTable);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create()
    {
        $tabs = Tab::get('user.role');
        $permissions = PermissionFacade::all();

        return view('avored-admin::user.role.create')
            ->with(compact('permissions', 'tabs'));
    }

    /**
     * Store a newly created resource in storage.
     * @param RoleRequest $request
     * @return RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        $this->saveRolePermissions($request, $role);

        return redirect()->route('admin.role.index')
            ->with('successNotification', __('avored-admin::system.notification.store', ['attribute' => 'Role']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Role $role
     * @return View
     */
    public function edit(Role $role)
    {
        $tabs = Tab::get('user.role');
        $permissions = PermissionFacade::all();

        return view('avored-admin::user.role.edit')
            ->with(compact('role', 'permissions', 'tabs'));
    }

    /**
     * Update the specified resource in storage.
     * @param RoleRequest $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $this->saveRolePermissions($request, $role);

        return redirect()->route('admin.role.index')
            ->with('successNotification', __('avored-admin::system.notification.updated', ['attribute' => 'Role']));
    }

    /**
     * Remove the specified resource from storage.
     * @param Role $role
     * @return JsonResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.role.index');
    }

    /**
     * Save Role Permission for the Users.
     * @param RoleRequest $request
     * @param Role $role
     * @return void
     */
    private function saveRolePermissions($request, Role $role): void
    {
        $permissionIds = Collection::make([]);

        if ($request->get('permissions') !== null && count($request->get('permissions')) > 0) {
            foreach ($request->get('permissions') as $key => $value) {

                if ((bool)$value !== true) {
                    continue;
                }
                $permissions = explode(',', $key);
                foreach ($permissions as $permissionName) {
                    $permissionModel = Permission::whereName($permissionName)->first();
                    if ($permissionModel === null) {
                        $permissionModel = Permission::create(['name' => $permissionName]);
                    }
                    $permissionIds->push($permissionModel->id);
                }
            }
            $ids = $permissionIds->unique();
            $role->permissions()->sync($ids);
        }
    }
}
