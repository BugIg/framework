<?php

use Faker\Generator as Faker;
use AvoRed\Framework\User\Models\UserGroup;

$factory->define(UserGroup::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'is_default' => rand(0, 1),
    ];
});
