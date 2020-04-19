<?php

namespace AvoRed\Framework\Tests\Controllers;

use AvoRed\Framework\Tests\BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use AvoRed\Framework\User\Models\Role;

class RoleTest extends BaseTestCase
{
    use RefreshDatabase;

    /* @runInSeparateProcess */
    public function testRoleIndexRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.role.index'))
            ->assertStatus(200)
            ->assertViewIs('avored::user.role.index');
    }

    /* @runInSeparateProcess */
    public function testRoleCreateRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.role.create'))
            ->assertStatus(200)
            ->assertViewIs('avored::user.role.create');
    }

    /* @runInSeparateProcess */
    public function testRoleStoreRouteTest()
    {
        $data = ['name' => 'test role name'];
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->post(route('admin.role.store', $data))
            ->assertRedirect(route('admin.role.index'));

        $this->assertDatabaseHas('roles', ['name' => 'test role name']);
    }

    /* @runInSeparateProcess */
    public function testRoleEditRouteTest()
    {
        $role = factory(Role::class)->create();
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.role.edit', $role->id))
            ->assertStatus(200)
            ->assertViewIs('avored::user.role.edit');
    }

    /* @runInSeparateProcess */
    public function testRoleUpdateRouteTest()
    {
        $role = factory(Role::class)->create();
        $role->name = "updated role name";
        $data = $role->toArray();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->put(route('admin.role.update', $role->id), $data)
            ->assertRedirect(route('admin.role.index'));

        $this->assertDatabaseHas('roles', ['name' => 'updated role name']);
    }

    /* @runInSeparateProcess */
    public function testRoleDestroyRouteTest()
    {
        $role = factory(Role::class)->create();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->delete(route('admin.role.destroy', $role->id))
            ->assertRedirect(route('admin.role.index'));

        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
    }
}
