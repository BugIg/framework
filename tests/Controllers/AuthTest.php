<?php

namespace AvoRed\Framework\Tests\Controllers;

use AvoRed\Framework\Tests\BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/** @runInSeparateProcess */
class AuthTest extends BaseTestCase
{
    use RefreshDatabase;

    /* @runInSeparateProcess */
    public function testAdminLoginRouteTest()
    {
        $this->get(route('admin.login'))
            ->assertStatus(200);
    }

    /* @runInSeparateProcess */
    public function testAdminLogoutRouteTest()
    {
        $this
            ->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->post(route('admin.logout'))
            ->assertRedirect(route('admin.login'));
    }

    /* @runInSeparateProcess */
    public function testAdminLoginRedirectGuestMiddleware()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.login'))
            ->assertRedirect(route('admin.dashboard'));
    }

    /* @runInSeparateProcess */
    public function testAdminLoginPostRoute()
    {
        $this->password = bcrypt('phpunit');
        $this->createAdminUser(['is_super_admin' => 1, 'password' => $this->password])
            ->actingAs($this->user, 'admin')
            ->post(route('admin.login.post', ['email' => $this->user->email, 'password' => $this->password]))
            ->assertRedirect(route('admin.dashboard'));
    }

    /* @runInSeparateProcess */
    public function testAdminLoginPostRouteFailed()
    {
        $this->password = bcrypt('phpunit');
        $this
            ->createAdminUser(['password' => $this->password])
            ->post(route('admin.login.post', ['email' => $this->user->email, 'password' => 'wrongpassword']))
            ->assertSessionHasErrors('email');
    }
}
