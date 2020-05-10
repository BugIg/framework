<?php
namespace AvoRed\Framework\Tests\Controllers;

use AvoRed\Framework\Catalog\Models\PropertyDropdownOption;
use AvoRed\Framework\Tests\BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use AvoRed\Framework\Catalog\Models\Property;
use Illuminate\Support\Str;

class PropertyTest extends BaseTestCase
{
    use RefreshDatabase;

    /* @runInSeparateProcess */
    public function testPropertyIndexRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.property.index'))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::catalog.property.index')
            ->assertSee(__('avored-admin::catalog.property.title'));
    }

    /* @runInSeparateProcess */
    public function testPropertyCreateRouteTest()
    {
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.property.create'))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::catalog.property.create');
    }

    /* @runInSeparateProcess */
    public function testPropertyStoreRouteTest()
    {
        $data = [
            'name' => 'test property name',
            'slug' => 'test-property-name',
            'field_type' => 'TEXT',
            'data_type' => 'VARCHAR',
            'use_for_all_products' => 1,
            'is_visible_frontend' => 1,
            'sort_order' => 10,
        ];
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->post(route('admin.property.store', $data))
            ->assertRedirect(route('admin.property.index'));

        $this->assertDatabaseHas($this->tablePrefix . 'properties', [
            'name' => json_encode([$this->getDefaultLocale() => 'test property name'])
        ]);
    }

    /* @runInSeparateProcess */
    public function testPropertyStoreRouteWithDropdownOptionsTest()
    {
        $data = [
            'name' => 'test property name',
            'slug' => 'test-property-name',
            'field_type' => 'SELECT',
            'data_type' => 'VARCHAR',
            'use_for_all_products' => 1,
            'is_visible_frontend' => 1,
            'sort_order' => 10,
            'dropdown_option' => [
                Str::random() => 'test option 1',
                Str::random() => 'option 2'
            ]
        ];
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->post(route('admin.property.store', $data))
            ->assertRedirect(route('admin.property.index'));

        $this->assertDatabaseHas($this->tablePrefix . 'properties', [
            'name' => json_encode([$this->getDefaultLocale() => 'test property name'])
        ]);
        $this->assertDatabaseHas($this->tablePrefix . 'property_dropdown_options', [
            'display_text' => json_encode([$this->getDefaultLocale() => 'test option 1'])
        ]);
    }

    /* @runInSeparateProcess */
    public function testPropertyEditRouteTest()
    {
        $property = factory(Property::class)->create();
        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->get(route('admin.property.edit', $property->id))
            ->assertStatus(200)
            ->assertViewIs('avored-admin::catalog.property.edit');
    }

    /* @runInSeparateProcess */
    public function testPropertyUpdateRouteTest()
    {
        $property = factory(Property::class)->create();
        $property->name = "updated property name";
        $data = $property->toArray();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->put(route('admin.property.update', $property->id), $data)
            ->assertRedirect(route('admin.property.index'));

        $this->assertDatabaseHas( $this->tablePrefix . 'properties',
            ['name' => json_encode([$this->getDefaultLocale() => 'updated property name'])]
        );
    }

    /* @runInSeparateProcess */
    public function testPropertyUpdateWithDropdownOptionsRouteTest()
    {
        $propertyDropdownOption = factory(PropertyDropdownOption::class)->create();
        $property = $propertyDropdownOption->property;
        $property->name = "updated property name";
        $data = $property->toArray();
        $data['dropdown_option'] = [
            $propertyDropdownOption->id => 'updated option 1'
        ];

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->put(route('admin.property.update', $property->id), $data)
            ->assertRedirect(route('admin.property.index'));

        $this->assertDatabaseHas( $this->tablePrefix . 'properties',
            ['name' => json_encode([$this->getDefaultLocale() => 'updated property name'])]
        );
        $this->assertDatabaseHas($this->tablePrefix . 'property_dropdown_options', [
            'display_text' => json_encode([$this->getDefaultLocale() => 'updated option 1'])
        ]);
    }

    /* @runInSeparateProcess */
    public function testPropertyDestroyRouteTest()
    {
        $property = factory(Property::class)->create();

        $this->createAdminUser()
            ->actingAs($this->user, 'admin')
            ->delete(route('admin.property.destroy', $property->id))
            ->assertRedirect(route('admin.property.index'));

        $this->assertDatabaseMissing($this->tablePrefix . 'properties', ['id' => $property->id]);
    }
}
