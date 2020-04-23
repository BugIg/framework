<?php
namespace AvoRed\Framework\System\Models;

use AvoRed\Framework\Support\BaseModel;

class Currency extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'code', 'symbol', 'conversation_rate', 'status'];
}
