<?php

namespace AvoRed\Framework\Catalog\Models;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\Support\Casts\TranslatableCast;

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

    protected $casts = [
        'name' => TranslatableCast::class,
        'slug' => TranslatableCast::class,
        'meta_title' => TranslatableCast::class,
        'meta_description' => TranslatableCast::class,
    ];

    /**
     * Category belongs to many products.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
