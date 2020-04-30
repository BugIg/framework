<?php
namespace AvoRed\Framework\Tests\Controllers;

use AvoRed\Framework\Catalog\Models\AttributeDropdownOption;
use AvoRed\Framework\Tests\BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use AvoRed\Framework\Catalog\Models\Attribute;

class AttributeTest extends BaseTestCase
{
    use RefreshDatabase;

    /* @runInSeparateProcess */
    public function testAttributeIndexRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.attribute.index'))
            ->assertStatus(200)
            ->assertViewIs('avored::catalog.attribute.index')
            ->assertSee(__('avored::catalog.attribute.title'));
    }

    /* @runInSeparateProcess */
    public function testAttributeCreateRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.attribute.create'))
            ->assertStatus(200)
            ->assertViewIs('avored::catalog.attribute.create');
    }

    /* @runInSeparateProcess */
    public function testAttributeStoreRouteTest()
    {
        $data = [
            'name' => 'test attribute name',
            'slug' => 'test-attribute-name',
            'dropdown_option' => [
                'abc' => 'option 1',
                'xyz' => 'option 2'
            ]
        ];
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->post(route('admin.attribute.store', $data))
            ->assertRedirect(route('admin.attribute.index'));

        $this->assertDatabaseHas($this->tablePrefix . 'attributes', [
            'name' => json_encode([$this->getDefaultLocale() => 'test attribute name'])
        ]);
        $this->assertDatabaseHas($this->tablePrefix . 'attribute_dropdown_options', [
            'display_text' => json_encode([$this->getDefaultLocale() => 'option 1'])
        ]);
    }

    /* @runInSeparateProcess */
    public function testAttributeEditRouteTest()
    {
        $attribute = factory(Attribute::class)->create();
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.attribute.edit', $attribute->id))
            ->assertStatus(200)
            ->assertViewIs('avored::catalog.attribute.edit');
    }

    /* @runInSeparateProcess */
    public function testAttributeUpdateRouteTest()
    {
        $attribute = factory(Attribute::class)->create();
        $attributeDropdownOption = factory(AttributeDropdownOption::class)
            ->create(['attribute_id' => $attribute->id]);


        $attribute->name = "updated attribute name";
        $attributeDropdownOption->display_text = 'updated option 1';

        $data = $attribute->toArray();
        $data['dropdown_option'][$attributeDropdownOption->id] = $attributeDropdownOption->display_text;


        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->put(route('admin.attribute.update', $attribute->id), $data)
            ->assertRedirect(route('admin.attribute.index'));

        $this->assertDatabaseHas( $this->tablePrefix . 'attributes',
            ['name' => json_encode([$this->getDefaultLocale() => 'updated attribute name'])]
        );
        $this->assertDatabaseHas($this->tablePrefix . 'attribute_dropdown_options', [
            'display_text' => json_encode([$this->getDefaultLocale() => 'updated option 1'])
        ]);
    }

    /* @runInSeparateProcess */
    public function testAttributeDestroyRouteTest()
    {
        $attribute = factory(Attribute::class)->create();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->delete(route('admin.attribute.destroy', $attribute->id))
            ->assertRedirect(route('admin.attribute.index'));

        $this->assertDatabaseMissing($this->tablePrefix . 'attributes', ['id' => $attribute->id]);
    }
}
