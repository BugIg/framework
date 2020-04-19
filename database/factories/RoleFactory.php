<?php

use Faker\Generator as Faker;

$factory->define(\AvoRed\Framework\User\Models\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text(rand(50, 60)),
    ];
});
