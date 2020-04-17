<?php

use Faker\Generator as Faker;
use AvoRed\Framework\User\Models\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt('secret'),
        'image_path' => null,
    ];
});
