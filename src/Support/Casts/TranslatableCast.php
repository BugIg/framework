<?php

namespace AvoRed\Framework\Support\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class TranslatableCast implements CastsAttributes
{
    /**
     * @var string
     */
    protected $fallbackLocal;

    /**
     * @var string
     */
    protected $local;

    public function __construct()
    {
        $this->local = app()->getLocale();
        $this->fallbackLocal = config('app.fallback_locale');
    }

    public function get($model, string $key, $value, array $attributes)
    {
        if ($value === null) {
            return null;
        }

        $values = json_decode($value, true);

        if (isset($values[$this->local])) {
            return $values[$this->local];
        }
        if (isset($values[$this->fallbackLocal])) {
            return $values[$this->fallbackLocal];
        }
        return null;

    }

    public function set($model, string $key, $value, array $attributes)
    {
        if ($value === null) {
            return null;
        }
        $jsonValue[$this->local] = $value;

        return json_encode($jsonValue);
    }
}
