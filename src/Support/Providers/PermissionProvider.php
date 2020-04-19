<?php

namespace AvoRed\Framework\Support\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use AvoRed\Framework\Permission\Manager;
use AvoRed\Framework\Permission\Permission;
use AvoRed\Framework\Permission\PermissionGroup;
use AvoRed\Framework\Support\Facades\Permission as PermissionFacade;

class PermissionProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        $this->registerPermissions();
    }

    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->registerManager();
        $this->app->singleton('permission', 'AvoRed\Framework\Permission\Manager');
    }

    /**
     * Register the permission Manager Instance.
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton(
            'permission',
            function () {
                new Manager();
            }
        );
    }

    /**
     * Get the services provided by the provider.
     * @return array
     */
    public function provides()
    {
        return ['permission', 'AvoRed\Framework\Permission\Manager'];
    }

    /**
     * Register the permissions.
     * @return void
     */
    protected function registerPermissions()
    {
        $group = PermissionFacade::add(
            'dashboard',
            function (PermissionGroup $group) {
                $group->label('avored::system.permissions.dashboard');
            }
        );
        $group->addPermission(
            'admin-dashboard',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.dashboard')
                    ->routes('admin.dashboard');
            }
        );

        $group = PermissionFacade::add(
            'category',
            function (PermissionGroup $group) {
                $group->label('avored::system.permissions.category.title');
            }
        );
        $group->addPermission(
            'admin-category-list',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.category.list')
                    ->routes('admin.category.index');
            }
        );
        $group->addPermission(
            'admin-category-create',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.category.create')
                    ->routes('admin.category.create,admin.category.store');
            }
        );
        $group->addPermission(
            'admin-category-update',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.category.edit')
                    ->routes('admin.category.edit,admin.category.update');
            }
        );
        $group->addPermission(
            'admin-category-destroy',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.category.destroy')
                    ->routes('admin.category.destroy');
            }
        );


        Blade::if(
            'hasPermission',
            function ($routeName) {
                $condition = false;
                $user = Auth::guard('admin')->user();
                if (! $user) {
                    $condition = $user->hasPermission($routeName) ?: false;
                }
                $converted_res = ($condition) ? 'true' : 'false';

                return "<?php if ($converted_res): ?>";
            }
        );
    }
}
