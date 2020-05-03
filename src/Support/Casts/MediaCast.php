<?php

namespace AvoRed\Framework\Support\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class MediaCast implements CastsAttributes
{

    public $url;

    public $absolutePath;

    public $dbPath;


    public function get($model, string $key, $value, array $attributes)
    {
       $this->url = asset('storage/' . $value);
       $this->absolutePath = storage_path('app/public/' . $value);
       $this->dbPath = $value;

       return $this;

    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
