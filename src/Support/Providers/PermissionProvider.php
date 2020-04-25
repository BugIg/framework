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

        $group = PermissionFacade::add(
            'language',
            function (PermissionGroup $group) {
                $group->label('avored::system.language.title');
            }
        );
        $group->addPermission(
            'admin-language-list',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.language.list')
                    ->routes('admin.language.index');
            }
        );
        $group->addPermission(
            'admin-language-create',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.language.create')
                    ->routes('admin.language.create,admin.language.store');
            }
        );
        $group->addPermission(
            'admin-language-update',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.language.edit')
                    ->routes('admin.language.edit,admin.language.update');
            }
        );
        $group->addPermission(
            'admin-language-destroy',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.language.destroy')
                    ->routes('admin.language.destroy');
            }
        );

        $group = PermissionFacade::add(
            'currency',
            function (PermissionGroup $group) {
                $group->label('avored::system.currency.title');
            }
        );
        $group->addPermission(
            'admin-currency-list',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.currency.list')
                    ->routes('admin.currency.index');
            }
        );
        $group->addPermission(
            'admin-currency-create',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.currency.create')
                    ->routes('admin.currency.create,admin.currency.store');
            }
        );
        $group->addPermission(
            'admin-currency-update',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.currency.edit')
                    ->routes('admin.currency.edit,admin.currency.update');
            }
        );
        $group->addPermission(
            'admin-currency-destroy',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.currency.destroy')
                    ->routes('admin.currency.destroy');
            }
        );

        $group = PermissionFacade::add(
            'page',
            function (PermissionGroup $group) {
                $group->label('avored::cms.page.title');
            }
        );


        $group->addPermission(
            'admin-page-list',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.page.list')
                    ->routes('admin.page.index');
            }
        );
        $group->addPermission(
            'admin-page-create',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.page.create')
                    ->routes('admin.page.create,admin.page.store');
            }
        );
        $group->addPermission(
            'admin-page-update',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.page.edit')
                    ->routes('admin.page.edit,admin.page.update');
            }
        );
        $group->addPermission(
            'admin-page-destroy',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.page.destroy')
                    ->routes('admin.page.destroy');
            }
        );


        $group = PermissionFacade::add(
            'property',
            function (PermissionGroup $group) {
                $group->label('avored::catalog.property.title');
            }
        );


        $group->addPermission(
            'admin-property-list',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.property.list')
                    ->routes('admin.property.index');
            }
        );
        $group->addPermission(
            'admin-property-create',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.property.create')
                    ->routes('admin.property.create,admin.property.store');
            }
        );
        $group->addPermission(
            'admin-property-update',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.property.edit')
                    ->routes('admin.property.edit,admin.property.update');
            }
        );
        $group->addPermission(
            'admin-property-destroy',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.property.destroy')
                    ->routes('admin.property.destroy');
            }
        );

        $group = PermissionFacade::add(
            'attribute',
            function (PermissionGroup $group) {
                $group->label('avored::system.attribute.title');
            }
        );


        $group->addPermission(
            'admin-attribute-list',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.attribute.list')
                    ->routes('admin.attribute.index');
            }
        );
        $group->addPermission(
            'admin-attribute-create',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.attribute.create')
                    ->routes('admin.property.create,admin.attribute.store');
            }
        );
        $group->addPermission(
            'admin-attribute-update',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.attribute.edit')
                    ->routes('admin.property.edit,admin.attribute.update');
            }
        );
        $group->addPermission(
            'admin-attribute-destroy',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.attribute.destroy')
                    ->routes('admin.attribute.destroy');
            }
        );


        $group = PermissionFacade::add(
            'attribute',
            function (PermissionGroup $group) {
                $group->label('avored::catalog.attribute.title');
            }
        );


        $group->addPermission(
            'admin-user-group-list',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.user-group.list')
                    ->routes('admin.user-group.index');
            }
        );
        $group->addPermission(
            'admin-user-group-create',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.user-group.create')
                    ->routes('admin.user-group.create,admin.user-group.store');
            }
        );
        $group->addPermission(
            'admin-user-group-update',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.user-group.edit')
                    ->routes('admin.user-group.edit,admin.user-group.update');
            }
        );
        $group->addPermission(
            'admin-user-group-destroy',
            function (Permission $permission) {
                $permission->label('avored::system.permissions.user-group.destroy')
                    ->routes('admin.user-group.destroy');
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
