<?php

namespace AvoRed\Framework\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Permission belongs to many role.
     * @return HasMany
     */
    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}
