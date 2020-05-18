<?php
namespace AvoRed\Framework\Tests\Controllers;

use AvoRed\Framework\Tests\BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use AvoRed\Framework\Catalog\Models\Category;

class CategoryTest extends BaseTestCase
{
    use RefreshDatabase;

    /* @runInSeparateProcess */
    public function testCategoryIndexRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.category.index'))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::catalog.category.index')
            ->assertSee(__('avored-admin::catalog.category.title'));
    }

    /* @runInSeparateProcess */
    public function testCategoryCreateRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.category.create'))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::catalog.category.create');
    }

    /* @runInSeparateProcess */
    public function testCategoryStoreRouteTest()
    {
        $data = ['name' => 'test category name', 'slug' => 'test-category-name'];
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->post(route('admin.category.store', $data))
            ->assertRedirect(route('admin.category.index'));

        $this->assertDatabaseHas(
            $this->tablePrefix . 'categories', 
            ['name' => $this->castToJson(json_encode([$this->getDefaultLocale() => 'test category name'], true))]
        );
    }

    /* @runInSeparateProcess */
    public function testCategoryEditRouteTest()
    {
        $category = factory(Category::class)->create();
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.category.edit', $category->id))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::catalog.category.edit');
    }

    /* @runInSeparateProcess */
    public function testCategoryUpdateRouteTest()
    {
        $category = factory(Category::class)->create();
        $category->name = "updated category name";
        $data = $category->toArray();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->put(route('admin.category.update', $category->id), $data)
            ->assertRedirect(route('admin.category.index'));

        $this->assertDatabaseHas( $this->tablePrefix . 'categories', [
            'name' => $this->castToJson(json_encode([$this->getDefaultLocale() => 'updated category name']))
        ]);
    }

    /* @runInSeparateProcess */
    public function testCategoryDestroyRouteTest()
    {
        $category = factory(Category::class)->create();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->delete(route('admin.category.destroy', $category->id))
            ->assertRedirect(route('admin.category.index'));

        $this->assertDatabaseMissing($this->tablePrefix . 'categories', ['id' => $category->id]);
    }
}
