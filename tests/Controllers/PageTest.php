<?php
namespace AvoRed\Framework\Tests\Controllers;

use AvoRed\Framework\Tests\BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use AvoRed\Framework\Cms\Models\Page;

class PageTest extends BaseTestCase
{
    use RefreshDatabase;

    /* @runInSeparateProcess */
    public function testPageIndexRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.page.index'))
            ->assertStatus(200)
            ->assertViewIs('avored::cms.page.index')
            ->assertSee(__('avored::cms.page.title'));
    }

    /* @runInSeparateProcess */
    public function testPageCreateRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.page.create'))
            ->assertStatus(200)
            ->assertViewIs('avored::cms.page.create');
    }

    /* @runInSeparateProcess */
    public function testPageStoreRouteTest()
    {
        $data = ['name' => 'test page name', 'slug' => 'test-page-name', 'content' => 'page content'];
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->post(route('admin.page.store', $data))
            ->assertRedirect(route('admin.page.index'));

        $this->assertDatabaseHas($this->tablePrefix . 'pages',
            ['name' => json_encode([$this->getDefaultLocale() => 'test page name'])]
        );
    }

    /* @runInSeparateProcess */
    public function testPageEditRouteTest()
    {
        $page = factory(Page::class)->create();
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.page.edit', $page->id))
            ->assertStatus(200)
            ->assertViewIs('avored::cms.page.edit');
    }

    /* @runInSeparateProcess */
    public function testPageUpdateRouteTest()
    {
        $page = factory(Page::class)->create();
        $page->name = "updated page name";
        $data = $page->toArray();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->put(route('admin.page.update', $page->id), $data)
            ->assertRedirect(route('admin.page.index'));

        $this->assertDatabaseHas( $this->tablePrefix . 'pages',
            ['name' => json_encode([$this->getDefaultLocale() => 'updated page name'])]
        );
    }

    /* @runInSeparateProcess */
    public function testPageDestroyRouteTest()
    {
        $page = factory(Page::class)->create();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->delete(route('admin.page.destroy', $page->id))
            ->assertRedirect(route('admin.page.index'));

        $this->assertDatabaseMissing($this->tablePrefix . 'pages', ['id' => $page->id]);
    }
}
