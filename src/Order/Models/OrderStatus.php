<?php

namespace AvoRed\Framework\Order\Models;

use AvoRed\Framework\Support\BaseModel;

class OrderStatus extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'is_default'];

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $casts = [
        'is_default' => 'bool'
    ];

}
