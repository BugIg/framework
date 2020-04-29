<?php

namespace AvoRed\Framework\Catalog\Models;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\Support\Casts\TranslatableCast;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'data_type',
        'field_type',
        'use_for_all_products',
        'is_visible_frontend',
        'use_for_category_filter',
        'sort_order',
    ];

    /**
     * The available data types for the product property.
     * @var array
     */
    const PROPERTY_DATATYPES = [
        'INTEGER' => 'Integer',
        'DECIMAL' => 'Decimal',
        'DATETIME' => 'Date Time',
        'VARCHAR' => 'VarChar (max:255)',
        'BOOLEAN' => 'Boolean (true/false)',
        'TEXT' => 'Text Area (big text)',
    ];

    /**
     * The available field types for the product property.
     * @var array
     */
    const PROPERTY_FIELDTYPES = [
        'TEXT' => 'Text box',
        'TEXTAREA' => 'Text Area',
        'CKEDITOR' => 'Rich Text Editor',
        'SELECT' => 'Select (dropdown)',
        'FILE' => 'File',
        'DATETIME' => 'Date Time',
        'RADIO' => 'Radio',
        'SWITCH' => 'Switch',
    ];

    protected $casts = [
        'name' => TranslatableCast::class,
        'slug' => TranslatableCast::class,
        'use_for_all_products' => 'bool'
    ];

    /**
     * Property has many dropdown options.
     * @return HasMany
     */
    public function dropdownOptions()
    {
        return $this->hasMany(PropertyDropdownOption::class);
    }
}
