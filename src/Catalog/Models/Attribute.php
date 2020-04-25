<?php

namespace AvoRed\Framework\Catalog\Models;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\Support\Casts\TranslatableCast;

class Attribute extends BaseModel
{
    /**
     * The available display as enum options.
     * @var array
     */
    const DISPLAY_AS = [
        'IMAGE' => 'Image',
        'Text' => 'Text',
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

}
