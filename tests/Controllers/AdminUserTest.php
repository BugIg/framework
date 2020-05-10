<?php
namespace AvoRed\Framework\Tests\Controllers;

use AvoRed\Framework\Tests\BaseTestCase;
use AvoRed\Framework\User\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use AvoRed\Framework\User\Models\AdminUser;
use Illuminate\Support\Facades\Hash;

class AdminUserTest extends BaseTestCase
{
    use RefreshDatabase;

    /* @runInSeparateProcess */
    public function testAdminUserIndexRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.admin-user.index'))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::user.admin-user.index');
    }

    /* @runInSeparateProcess */
    public function testAdminUserCreateRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.admin-user.create'))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::user.admin-user.create');
    }

    /* @runInSeparateProcess */
    public function testAdminUserStoreRouteTest()
    {
        $password = 'secret123';
        $role = factory(Role::class)->create();

        $data = [
            'first_name' => 'test first name',
            'last_name' => 'test last name',
            'role_id' => $role->id,
            'email' => 'test@test.com',
            'password' => $password,
            'password_confirmation' => $password,
            'language' => 'en',
            'is_super_admin' => rand(0, 1)
        ];
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->post(route('admin.admin-user.store', $data))
            ->assertRedirect(route('admin.admin-user.index'));

        $this->assertDatabaseHas($this->tablePrefix . 'admin_users', [
            'first_name' => 'test first name'
        ]);
    }

    /* @runInSeparateProcess */
    public function testAdminUserEditRouteTest()
    {
        $adminUser = factory(AdminUser::class)->create();
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.admin-user.edit', $adminUser->id))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::user.admin-user.edit');
    }

    /* @runInSeparateProcess */
    public function testAdminUserUpdateRouteTest()
    {
        $adminUser = factory(AdminUser::class)->create();
        $adminUser->first_name = "updated admin-user first name";
        $data = $adminUser->toArray();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->put(route('admin.admin-user.update', $adminUser->id), $data)
            ->assertRedirect(route('admin.admin-user.index'));

        $this->assertDatabaseHas( $this->tablePrefix . 'admin_users',
            ['first_name' => 'updated admin-user first name']
        );
    }

    /* @runInSeparateProcess */
    public function testAdminUserDestroyRouteTest()
    {
        $adminUser = factory(AdminUser::class)->create();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->delete(route('admin.admin-user.destroy', $adminUser->id))
            ->assertRedirect(route('admin.admin-user.index'));

        $this->assertDatabaseMissing($this->tablePrefix . 'admin_users', ['id' => $adminUser->id]);
    }
}
