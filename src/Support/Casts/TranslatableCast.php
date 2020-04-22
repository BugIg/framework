<?php

namespace AvoRed\Framework\Support\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Facades\App;

class TranslatableCast implements CastsAttributes
{

    public function get($model, string $key, $value, array $attributes)
    {
        if ($value === null) {
            return null;
        }
        $locale = App::getLocale();
        $values = json_decode($value, true);

        return $values[$locale];

    }

    public function set($model, string $key, $value, array $attributes)
    {
        if ($value === null) {
            return null;
        }
        $jsonValue['en'] = $value;

        return json_encode($jsonValue);
    }
}
