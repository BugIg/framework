<?php

namespace AvoRed\Framework\Catalog\Models;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\Support\Casts\TranslatableCast;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends BaseModel
{
    /**
     * The available display as enum options.
     * @var array
     */
    const DISPLAY_AS = [
        ['label' => 'Image', 'value'=> 'IMAGE'],
        ['label' => 'Text', 'value'=> 'TEXT']
    ];

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'display_as'
    ];

    protected $casts = [
        'name' => TranslatableCast::class,
        'slug' => TranslatableCast::class
    ];


    /**
     * Property has many dropdown options.
     * @return HasMany
     */
    public function dropdownOptions()
    {
        return $this->hasMany(AttributeDropdownOption::class);
    }

}
