<?php

namespace AvoRed\Framework\User\Models;

use AvoRed\Framework\Support\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends BaseModel
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

}
