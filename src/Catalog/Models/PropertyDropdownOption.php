<?php
namespace AvoRed\Framework\Catalog\Models;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\Support\Casts\TranslatableCast;

class PropertyDropdownOption extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['property_id', 'display_text', 'path'];

    protected $casts = [
        'display_text' => TranslatableCast::class,
    ];
}
