<?php
namespace AvoRed\Framework\Catalog\Models;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\Support\Casts\TranslatableCast;

class AttributeDropdownOption extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['attribute_id', 'display_text', 'path'];

    protected $casts = [
        'display_text' => TranslatableCast::class,
    ];

    public function property() {
        return $this->belongsTo(Attribute::class);
    }
}
