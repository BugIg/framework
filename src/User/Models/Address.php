<?php

namespace AvoRed\Framework\User\Models;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\System\Models\Country;

class Address extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'type',
        'user_id',
        'first_name',
        'last_name',
        'company_name',
        'phone',
        'address1',
        'address2',
        'postcode',
        'city',
        'state',
        'country_id',
    ];

    const TYPEOPTIONS = [
        'SHIPPING' => 'Shipping Address',
        'BILLING' => 'Billing Address',
    ];

    /**
     * Address Belongs to a Country Model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
