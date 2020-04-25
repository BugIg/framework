<?php

use Faker\Generator as Faker;
use AvoRed\Framework\Order\Models\OrderStatus;

$factory->define(OrderStatus::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'is_default' => rand(0, 1),
    ];
});
