<?php

namespace AvoRed\Framework\Catalog\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
