<?php

namespace AvoRed\Framework\Catalog\Models;

use AvoRed\Framework\Support\BaseModel;

class Category extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'meta_title', 'meta_description'
    ];
}
