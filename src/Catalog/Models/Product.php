<?php

namespace AvoRed\Framework\Catalog\Models;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\Support\Casts\TranslatableCast;
use AvoRed\Framework\System\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'slug',
        'sku',
        'barcode',
        'description',
        'status',
        'in_stock',
        'track_stock',
        'qty',
        'price',
        'cost_price',
        'weight',
        'width',
        'height',
        'length',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'name' => TranslatableCast::class,
        'slug' => TranslatableCast::class,
        'description' => TranslatableCast::class,
        'meta_title' => TranslatableCast::class,
        'meta_description' => TranslatableCast::class,
    ];

    /**
     * Belongs to Many Categories.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Product has many images
     * @return MorphMany $images
     */
    public function images()
    {
        return $this->morphMany(Media::class, 'owner');
    }


}
