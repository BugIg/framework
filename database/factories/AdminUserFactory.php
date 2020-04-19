<?php

use Faker\Generator as Faker;
use AvoRed\Framework\User\Models\AdminUser;

$factory->define(\AvoRed\Framework\User\Models\AdminUser::class, function (Faker $faker) {
    $role = factory(\AvoRed\Framework\User\Models\Role::class)->create();
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt('secret'),
        'role_id' => $role->id,
        'is_super_admin' => rand(0, 1),
        'image_path' => null,
    ];
});
