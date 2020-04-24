<?php

use Faker\Generator as Faker;
use AvoRed\Framework\System\Models\Currency;

$factory->define(Currency::class, function (Faker $faker) {
    return [
        'name' => 'US Dollar',
        'code' => $faker->currencyCode,
        'symbol' => '$',
        'conversation_rate' => $faker->randomFloat,
        'status' => 'ENABLED',
    ];
});
