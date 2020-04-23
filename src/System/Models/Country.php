<?php
namespace AvoRed\Framework\System\Models;

use AvoRed\Framework\Support\BaseModel;

class Country extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'code', 'phone_code', 'currency_code', 'currency_symbol', 'lang_code'];
}
