<?php
namespace AvoRed\Framework\Tests\Controllers;

use AvoRed\Framework\Tests\BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use AvoRed\Framework\User\Models\UserGroup;

class UserGroupTest extends BaseTestCase
{
    use RefreshDatabase;

    /* @runInSeparateProcess */
    public function testUserGroupIndexRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.user-group.index'))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::user.user-group.index')
            ->assertSee(__('avored-admin::user.user-group.title'));
    }

    /* @runInSeparateProcess */
    public function testUserGroupCreateRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.user-group.create'))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::user.user-group.create');
    }

    /* @runInSeparateProcess */
    public function testUserGroupStoreRouteTest()
    {
        $data = [
            'name' => 'test user-group name',
            'is_default' => rand(0, 1)
        ];
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->post(route('admin.user-group.store', $data))
            ->assertRedirect(route('admin.user-group.index'));

        $this->assertDatabaseHas($this->tablePrefix . 'user_groups', [
            'name' => 'test user-group name'
        ]);
    }

    /* @runInSeparateProcess */
    public function testUserGroupEditRouteTest()
    {
        $userGroup = factory(UserGroup::class)->create();
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.user-group.edit', $userGroup->id))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::user.user-group.edit');
    }

    /* @runInSeparateProcess */
    public function testUserGroupUpdateRouteTest()
    {
        $userGroup = factory(UserGroup::class)->create();
        $userGroup->name = "updated user-group name";
        $data = $userGroup->toArray();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->put(route('admin.user-group.update', $userGroup->id), $data)
            ->assertRedirect(route('admin.user-group.index'));

        $this->assertDatabaseHas( $this->tablePrefix . 'user_groups',
            ['name' => 'updated user-group name']
        );
    }

    /* @runInSeparateProcess */
    public function testUserGroupDestroyRouteTest()
    {
        $userGroup = factory(UserGroup::class)->create();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->delete(route('admin.user-group.destroy', $userGroup->id))
            ->assertRedirect(route('admin.user-group.index'));

        $this->assertDatabaseMissing($this->tablePrefix . 'user_groups', ['id' => $userGroup->id]);
    }
}
