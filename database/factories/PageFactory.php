<?php

use Faker\Generator as Faker;
use AvoRed\Framework\Cms\Models\Page;

$factory->define(Page::class, function (Faker $faker) {
    $name = $faker->word;

    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'content' => $faker->sentence,
        'meta_title' => $faker->sentence,
        'meta_description' => $faker->sentence,
    ];
});
