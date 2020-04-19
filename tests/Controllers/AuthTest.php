<?php

namespace AvoRed\Framework\Tests\Controllers;

use AvoRed\Framework\Tests\BaseTestCase;
use AvoRed\Framework\User\Models\AdminUser;
use AvoRed\Framework\User\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

/** @runInSeparateProcess */
class AuthTest extends BaseTestCase
{
    use RefreshDatabase, WithFaker;

    const ROUTE_PASSWORD_EMAIL = 'admin.password.email';
    const ROUTE_PASSWORD_REQUEST = 'admin.password.request';
    const ROUTE_PASSWORD_RESET = 'admin.password.reset';
    const ROUTE_PASSWORD_RESET_SUBMIT = 'admin.password.update';

    const USER_ORIGINAL_PASSWORD = 'secret';

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
        $this->createAdminUser(['password' => $this->password])
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


    /* @runInSeparateProcess */
    public function testShowPasswordResetRequestPage()
    {
        $this
            ->get(route(self::ROUTE_PASSWORD_REQUEST))
            ->assertSuccessful()
            ->assertViewIs('avored::user.auth.passwords.email');
    }

    /* @runInSeparateProcess */
    public function testSubmitPasswordResetRequestInvalidEmail()
    {
        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_REQUEST))
            ->post(route(self::ROUTE_PASSWORD_EMAIL), [
                'email' => Str::random(),
            ])
            ->assertSuccessful()
            ->assertSee(__('validation.email', [
                'attribute' => 'email',
            ]));
    }

    /* @runInSeparateProcess */
    public function testSubmitPasswordResetRequestEmailNotFound()
    {
        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_REQUEST))
            ->post(route(self::ROUTE_PASSWORD_EMAIL), [
                'email' => $this->faker->unique()->safeEmail,
            ])
            ->assertSuccessful();
    }

    /* @runInSeparateProcess */
    public function testSubmitPasswordResetRequest()
    {
        $user = factory(AdminUser::class)->create();

        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_REQUEST))
            ->post(route(self::ROUTE_PASSWORD_EMAIL), [
                'email' => $user->email,
            ])
            ->assertSuccessful();

        Notification::assertSentTo($user, ResetPassword::class);
    }

    /* @runInSeparateProcess */
    public function testShowPasswordResetPage()
    {
        $user = factory(AdminUser::class)->create();

        $token = Password::broker('adminusers')->createToken($user);

        $this
            ->get(route(self::ROUTE_PASSWORD_RESET, [
                'token' => $token,
            ]))
            ->assertSuccessful()
            ->assertViewIs('avored::user.auth.passwords.reset');
    }

    /* @runInSeparateProcess */
    public function testSubmitPasswordResetInvalidEmail()
    {
        $user = factory(AdminUser::class)->create([
            'password' => bcrypt(self::USER_ORIGINAL_PASSWORD),
        ]);

        $token = Password::broker('adminusers')->createToken($user);

        $password = Str::random();

        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_RESET, [
                'token' => $token,
            ]))
            ->post(route(self::ROUTE_PASSWORD_RESET_SUBMIT), [
                'token' => $token,
                'email' => Str::random(),
                'password' => $password,
                'password_confirmation' => $password,
            ])
            ->assertSuccessful()
            ->assertSee(__('validation.email', [
                'attribute' => 'email',
            ]));

        $user->refresh();

        $this->assertFalse(Hash::check($password, $user->password));

        $this->assertTrue(Hash::check(self::USER_ORIGINAL_PASSWORD,
            $user->password));
    }

    /* @runInSeparateProcess */
    public function testSubmitPasswordResetEmailNotFound()
    {
        $user = factory(AdminUser::class)->create([
            'password' => bcrypt(self::USER_ORIGINAL_PASSWORD),
        ]);

        $token = Password::broker('adminusers')->createToken($user);

        $password = Str::random();

        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_RESET, [
                'token' => $token,
            ]))
            ->post(route(self::ROUTE_PASSWORD_RESET_SUBMIT), [
                'token' => $token,
                'email' => $this->faker->unique()->safeEmail,
                'password' => $password,
                'password_confirmation' => $password,
            ])
            ->assertSuccessful();

        $user->refresh();

        $this->assertFalse(Hash::check($password, $user->password));

        $this->assertTrue(Hash::check(self::USER_ORIGINAL_PASSWORD,
            $user->password));
    }

    /* @runInSeparateProcess */
    public function testSubmitPasswordResetPasswordMismatch()
    {
        $user = factory(AdminUser::class)->create([
            'password' => bcrypt(self::USER_ORIGINAL_PASSWORD),
        ]);

        $token = Password::broker('adminusers')->createToken($user);

        $password = Str::random();
        $password_confirmation = Str::random();

        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_RESET, [
                'token' => $token,
            ]))
            ->post(route(self::ROUTE_PASSWORD_RESET_SUBMIT), [
                'token' => $token,
                'email' => $user->email,
                'password' => $password,
                'password_confirmation' => $password_confirmation,
            ])
            ->assertSuccessful()
            ->assertSee(__('validation.confirmed', [
                'attribute' => 'password',
            ]));

        $user->refresh();

        $this->assertFalse(Hash::check($password, $user->password));

        $this->assertTrue(Hash::check(self::USER_ORIGINAL_PASSWORD,
            $user->password));
    }

    /* @runInSeparateProcess */
    public function testSubmitPasswordResetPasswordTooShort()
    {
        $user = factory(AdminUser::class)->create([
            'password' => bcrypt(self::USER_ORIGINAL_PASSWORD),
        ]);

        $token = Password::broker('adminusers')->createToken($user);

        $password = Str::random(5);

        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_RESET, [
                'token' => $token,
            ]))
            ->post(route(self::ROUTE_PASSWORD_RESET_SUBMIT), [
                'token' => $token,
                'email' => $user->email,
                'password' => $password,
                'password_confirmation' => $password,
            ])
            ->assertSuccessful()
            ->assertSee(__('validation.min.string', [
                'attribute' => 'password',
                'min' => 8,
            ]));

        $user->refresh();

        $this->assertFalse(Hash::check($password, $user->password));

        $this->assertTrue(Hash::check(self::USER_ORIGINAL_PASSWORD,
            $user->password));
    }

    /* @runInSeparateProcess */
    public function testSubmitPasswordReset()
    {
        $user = factory(AdminUser::class)->create([
            'password' => bcrypt(self::USER_ORIGINAL_PASSWORD),
        ]);

        $token = Password::broker('adminusers')->createToken($user);

        $password = Str::random();

        $this
            ->followingRedirects()
            ->from(route(self::ROUTE_PASSWORD_RESET, [
                'token' => $token,
            ]))
            ->post(route(self::ROUTE_PASSWORD_RESET_SUBMIT), [
                'token' => $token,
                'email' => $user->email,
                'password' => $password,
                'password_confirmation' => $password,
            ])
            ->assertSuccessful();

        $user->refresh();

        $this->assertFalse(Hash::check(self::USER_ORIGINAL_PASSWORD,
            $user->password));

        $this->assertTrue(Hash::check($password, $user->password));
    }
}
