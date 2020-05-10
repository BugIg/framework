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
                $group->label('avored-admin::system.permissions.dashboard');
            }
        );
        $group->addPermission(
            'admin-dashboard',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.dashboard')
                    ->routes('admin.dashboard');
            }
        );

        $group = PermissionFacade::add(
            'product',
            function (PermissionGroup $group) {
                $group->label('avored-admin::system.permissions.product.title');
            }
        );
        $group->addPermission(
            'admin-product-list',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.product.list')
                    ->routes('admin.product.index');
            }
        );
        $group->addPermission(
            'admin-product-create',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.product.create')
                    ->routes('admin.product.create,admin.product.store');
            }
        );
        $group->addPermission(
            'admin-product-update',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.product.edit')
                    ->routes('admin.product.edit,admin.product.update');
            }
        );
        $group->addPermission(
            'admin-product-destroy',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.product.destroy')
                    ->routes('admin.product.destroy');
            }
        );



        $group = PermissionFacade::add(
            'category',
            function (PermissionGroup $group) {
                $group->label('avored-admin::system.permissions.category.title');
            }
        );
        $group->addPermission(
            'admin-category-list',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.category.list')
                    ->routes('admin.category.index');
            }
        );
        $group->addPermission(
            'admin-category-create',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.category.create')
                    ->routes('admin.category.create,admin.category.store');
            }
        );
        $group->addPermission(
            'admin-category-update',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.category.edit')
                    ->routes('admin.category.edit,admin.category.update');
            }
        );
        $group->addPermission(
            'admin-category-destroy',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.category.destroy')
                    ->routes('admin.category.destroy');
            }
        );

        $group = PermissionFacade::add(
            'language',
            function (PermissionGroup $group) {
                $group->label('avored-admin::system.language.title');
            }
        );
        $group->addPermission(
            'admin-language-list',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.language.list')
                    ->routes('admin.language.index');
            }
        );
        $group->addPermission(
            'admin-language-create',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.language.create')
                    ->routes('admin.language.create,admin.language.store');
            }
        );
        $group->addPermission(
            'admin-language-update',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.language.edit')
                    ->routes('admin.language.edit,admin.language.update');
            }
        );
        $group->addPermission(
            'admin-language-destroy',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.language.destroy')
                    ->routes('admin.language.destroy');
            }
        );

        $group = PermissionFacade::add(
            'currency',
            function (PermissionGroup $group) {
                $group->label('avored-admin::system.currency.title');
            }
        );
        $group->addPermission(
            'admin-currency-list',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.currency.list')
                    ->routes('admin.currency.index');
            }
        );
        $group->addPermission(
            'admin-currency-create',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.currency.create')
                    ->routes('admin.currency.create,admin.currency.store');
            }
        );
        $group->addPermission(
            'admin-currency-update',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.currency.edit')
                    ->routes('admin.currency.edit,admin.currency.update');
            }
        );
        $group->addPermission(
            'admin-currency-destroy',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.currency.destroy')
                    ->routes('admin.currency.destroy');
            }
        );

        $group = PermissionFacade::add(
            'page',
            function (PermissionGroup $group) {
                $group->label('avored-admin::cms.page.title');
            }
        );


        $group->addPermission(
            'admin-page-list',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.page.list')
                    ->routes('admin.page.index');
            }
        );
        $group->addPermission(
            'admin-page-create',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.page.create')
                    ->routes('admin.page.create,admin.page.store');
            }
        );
        $group->addPermission(
            'admin-page-update',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.page.edit')
                    ->routes('admin.page.edit,admin.page.update');
            }
        );
        $group->addPermission(
            'admin-page-destroy',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.page.destroy')
                    ->routes('admin.page.destroy');
            }
        );


        $group = PermissionFacade::add(
            'property',
            function (PermissionGroup $group) {
                $group->label('avored-admin::catalog.property.title');
            }
        );


        $group->addPermission(
            'admin-property-list',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.property.list')
                    ->routes('admin.property.index');
            }
        );
        $group->addPermission(
            'admin-property-create',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.property.create')
                    ->routes('admin.property.create,admin.property.store');
            }
        );
        $group->addPermission(
            'admin-property-update',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.property.edit')
                    ->routes('admin.property.edit,admin.property.update');
            }
        );
        $group->addPermission(
            'admin-property-destroy',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.property.destroy')
                    ->routes('admin.property.destroy');
            }
        );

        $group = PermissionFacade::add(
            'attribute',
            function (PermissionGroup $group) {
                $group->label('avored-admin::system.attribute.title');
            }
        );


        $group->addPermission(
            'admin-attribute-list',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.attribute.list')
                    ->routes('admin.attribute.index');
            }
        );
        $group->addPermission(
            'admin-attribute-create',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.attribute.create')
                    ->routes('admin.property.create,admin.attribute.store');
            }
        );
        $group->addPermission(
            'admin-attribute-update',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.attribute.edit')
                    ->routes('admin.property.edit,admin.attribute.update');
            }
        );
        $group->addPermission(
            'admin-attribute-destroy',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.attribute.destroy')
                    ->routes('admin.attribute.destroy');
            }
        );


        $group = PermissionFacade::add(
            'attribute',
            function (PermissionGroup $group) {
                $group->label('avored-admin::catalog.attribute.title');
            }
        );


        $group->addPermission(
            'admin-user-group-list',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.user-group.list')
                    ->routes('admin.user-group.index');
            }
        );
        $group->addPermission(
            'admin-user-group-create',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.user-group.create')
                    ->routes('admin.user-group.create,admin.user-group.store');
            }
        );
        $group->addPermission(
            'admin-user-group-update',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.user-group.edit')
                    ->routes('admin.user-group.edit,admin.user-group.update');
            }
        );
        $group->addPermission(
            'admin-user-group-destroy',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.user-group.destroy')
                    ->routes('admin.user-group.destroy');
            }
        );

        $group = PermissionFacade::add(
            'order-status',
            function (PermissionGroup $group) {
                $group->label('avored-admin::order.order-status.title');
            }
        );


        $group->addPermission(
            'admin-order-status-list',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.order-status.list')
                    ->routes('admin.order-status.index');
            }
        );
        $group->addPermission(
            'admin-order-status-create',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.order-status.create')
                    ->routes('admin.order-status.create,admin.order-status.store');
            }
        );
        $group->addPermission(
            'admin-order-status-update',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.order-status.edit')
                    ->routes('admin.order-status.edit,admin.order-status.update');
            }
        );
        $group->addPermission(
            'admin-order-status-destroy',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.order-status.destroy')
                    ->routes('admin.order-status.destroy');
            }
        );





        $group = PermissionFacade::add(
            'order-status',
            function (PermissionGroup $group) {
                $group->label('avored-admin::order.order-status.title');
            }
        );


        $group->addPermission(
            'admin-admin-user-list',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.admin-user.list')
                    ->routes('admin.admin-user.index');
            }
        );
        $group->addPermission(
            'admin-admin-user-create',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.admin-user.create')
                    ->routes('admin.admin-user.create,admin.admin-user.store');
            }
        );
        $group->addPermission(
            'admin-admin-user-update',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.admin-user.edit')
                    ->routes('admin.admin-user.edit,admin.admin-user.update');
            }
        );
        $group->addPermission(
            'admin-admin-user-destroy',
            function (Permission $permission) {
                $permission->label('avored-admin::system.permissions.admin-user.destroy')
                    ->routes('admin.admin-user.destroy');
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
