<?php

namespace AvoRed\Framework\User\Models;

use AvoRed\Framework\Support\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserGroup extends BaseModel
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
