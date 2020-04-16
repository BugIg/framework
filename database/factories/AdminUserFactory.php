<?php

use Faker\Generator as Faker;
use AvoRed\Framework\User\Models\AdminUser;

$factory->define(AdminUser::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt('secret'),
        'image_path' => null,
    ];
});
