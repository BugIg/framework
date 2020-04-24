<?php
namespace AvoRed\Framework\Tests\Controllers;

use AvoRed\Framework\System\Models\Currency;
use AvoRed\Framework\Tests\BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CurrencyTest extends BaseTestCase
{
    use RefreshDatabase;

    /* @runInSeparateProcess */
    public function testCurrencyIndexRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.currency.index'))
            ->assertStatus(200)
            ->assertViewIs('avored::system.currency.index')
            ->assertSee(__('avored::system.currency.title'));
    }

    /* @runInSeparateProcess */
    public function testCurrencyCreateRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.currency.create'))
            ->assertStatus(200)
            ->assertViewIs(__('avored::system.currency.create'));
    }

    /* @runInSeparateProcess */
    public function testCurrencyStoreRouteTest()
    {
        $data = ['name' => 'test currency name', 'code' => 'en', 'conversation_rate' => 1];
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->post(route('admin.currency.store', $data))
            ->assertRedirect(route('admin.currency.index'));

        $this->assertDatabaseHas($this->tablePrefix . 'currencies', ['name' => 'test currency name']);
    }

    /* @runInSeparateProcess */
    public function testCurrencyEditRouteTest()
    {
        $currency = factory(Currency::class)->create();
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.currency.edit', $currency->id))
            ->assertStatus(200)
            ->assertViewIs(__('avored::system.currency.edit'));
    }

    /* @runInSeparateProcess */
    public function testCurrencyUpdateRouteTest()
    {
        $currency = factory(Currency::class)->create();
        $currency->name = "updated currency name";
        $data = $currency->toArray();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->put(route('admin.currency.update', $currency->id), $data)
            ->assertRedirect(route('admin.currency.index'));

        $this->assertDatabaseHas($this->tablePrefix . 'currencies', ['name' => 'updated currency name']);
    }

    /* @runInSeparateProcess */
    public function testCurrencyDestroyRouteTest()
    {
        $currency = factory(Currency::class)->create();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->delete(route('admin.currency.destroy', $currency->id))
            ->assertRedirect(route('admin.currency.index'));

        $this->assertDatabaseMissing($this->tablePrefix . 'currencies', ['id' => $currency->id]);
    }
}
