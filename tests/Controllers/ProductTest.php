<?php

namespace AvoRed\Framework\Tests\Controllers;

use AvoRed\Framework\Tests\BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use AvoRed\Framework\Catalog\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

class ProductTest extends BaseTestCase
{
    use RefreshDatabase, WithFaker;

    /* @runInSeparateProcess */
    public function testProductIndexRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.product.index'))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::catalog.product.index');
    }

    /* @runInSeparateProcess */
    public function testProductCreateRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.product.create'))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::catalog.product.create');
    }

    /* @runInSeparateProcess */
    public function testProductStoreRouteTest()
    {
        $name = 'test product name';
        $price = 100.23;

        $data = [
            'type' => 'BASIC',
            'name' => $name,
            'slug' => Str::slug($name),
            'sku' => 'SKU' . $this->faker->numberBetween(0, 10000),
            'barcode' => $this->faker->numberBetween(100000,9999999),  
            'description' => $this->faker->sentence,
            'status' => 1,
            'in_stock' => 1,
            'track_stock' => 1,
            'qty' => $this->faker->numberBetween (0, 200),
            'price' => $price,
            'cost_price' => $price - $this->faker->numberBetween (0, 10),
            'weight' => $this->faker->numberBetween(0,100),
            'width' => $this->faker->numberBetween(0,100),
            'height' => $this->faker->numberBetween(0,100),
            'length' => $this->faker->numberBetween(0,100)
        ];
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->post(route('admin.product.store', $data))
            ->assertRedirect(route('admin.product.index'));

        $this->assertDatabaseHas($this->tablePrefix . 'products', ['name' => $this->castToJson(json_encode([$this->getDefaultLocale() => $name]))]);
    }

    /* @runInSeparateProcess */
    public function testProductEditRouteTest()
    {
        $product = factory(Product::class)->create();
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.product.edit', $product->id))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::catalog.product.edit');
    }

    /* @runInSeparateProcess */
    public function testProductUpdateRouteTest()
    {
        $product = factory(Product::class)->create();
        $product->name = "updated product name";
        $data = $product->toArray();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->put(route('admin.product.update', $product->id), $data)
            ->assertRedirect(route('admin.product.index'));

        $this->assertDatabaseHas($this->tablePrefix . 'products', [
            'name' => $this->castToJson(json_encode([$this->getDefaultLocale() => 'updated product name']))
        ]);
    }

    /* @runInSeparateProcess */
    public function testProductDestroyRouteTest()
    {
        $product = factory(Product::class)->create();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->delete(route('admin.product.destroy', $product->id))
            ->assertRedirect(route('admin.product.index'));

        $this->assertDatabaseMissing($this->tablePrefix . 'products', ['id' => $product->id]);
    }
}
