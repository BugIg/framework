<?php

namespace AvoRed\Framework\System\Models;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\Support\Casts\MediaCast;
use AvoRed\Framework\User\Models\AdminUser;

class Media extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['path', 'owner_id', 'owner_type'];

     /**
     * Get the owning imageable model.
     */
    public function owner()
    {
        return $this->morphTo();
    }

    protected $casts = [
        'path' => MediaCast::class
    ];
}
