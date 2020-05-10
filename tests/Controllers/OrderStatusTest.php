<?php
namespace AvoRed\Framework\Tests\Controllers;

use AvoRed\Framework\Tests\BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use AvoRed\Framework\Order\Models\OrderStatus;

class OrderStatusTest extends BaseTestCase
{
    use RefreshDatabase;

    /* @runInSeparateProcess */
    public function testOrderStatusIndexRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.order-status.index'))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::order.order-status.index')
            ->assertSee(__('avored-admin::order.order-status.title'));
    }

    /* @runInSeparateProcess */
    public function testOrderStatusCreateRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.order-status.create'))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::order.order-status.create');
    }

    /* @runInSeparateProcess */
    public function testOrderStatusStoreRouteTest()
    {
        $data = [
            'name' => 'test order-status name',
            'is_default' => rand(0, 1)
        ];
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->post(route('admin.order-status.store', $data))
            ->assertRedirect(route('admin.order-status.index'));

        $this->assertDatabaseHas($this->tablePrefix . 'order_statuses', [
            'name' => 'test order-status name'
        ]);
    }

    /* @runInSeparateProcess */
    public function testOrderStatusEditRouteTest()
    {
        $orderStatus = factory(OrderStatus::class)->create();
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.order-status.edit', $orderStatus->id))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::order.order-status.edit');
    }

    /* @runInSeparateProcess */
    public function testOrderStatusUpdateRouteTest()
    {
        $orderStatus = factory(OrderStatus::class)->create();
        $orderStatus->name = "updated order-status name";
        $data = $orderStatus->toArray();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->put(route('admin.order-status.update', $orderStatus->id), $data)
            ->assertRedirect(route('admin.order-status.index'));

        $this->assertDatabaseHas( $this->tablePrefix . 'order_statuses',
            ['name' => 'updated order-status name']
        );
    }

    /* @runInSeparateProcess */
    public function testOrderStatusDestroyRouteTest()
    {
        $orderStatus = factory(OrderStatus::class)->create();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->delete(route('admin.order-status.destroy', $orderStatus->id))
            ->assertRedirect(route('admin.order-status.index'));

        $this->assertDatabaseMissing($this->tablePrefix . 'order_statuses', ['id' => $orderStatus->id]);
    }
}
