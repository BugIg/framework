<?php

namespace AvoRed\Framework\Cms\Models;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\Support\Casts\TranslatableCast;

class Menu extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'identifier',
        'is_default'
    ];

    /**
     * The attributes that are castable.
     * @var array
     */
    protected $casts = [
        'is_default' => 'bool'
    ];
}
