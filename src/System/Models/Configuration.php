<?php
namespace AvoRed\Framework\System\Models;

use AvoRed\Framework\Support\BaseModel;
use AvoRed\Framework\Support\Casts\TranslatableCast;

class Configuration extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['key', 'value'];


    protected $casts = [
        'value' => TranslatableCast::class,
    ];
    

    public function getValue($key)
    {
        $model = $this->where('key', $key)->first();
        if ($model === null) {
            return '';
        }
        
        return $model->value;
    }

}
