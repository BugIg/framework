<?php

namespace AvoRed\Framework\System\Models;

use AvoRed\Framework\Support\BaseModel;

class Language extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'code', 'is_default'];

    protected $casts = [
        'is_default' => 'bool'
    ];
}
