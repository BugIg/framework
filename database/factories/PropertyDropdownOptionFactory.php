<?php

use Faker\Generator as Faker;
use AvoRed\Framework\Catalog\Models\PropertyDropdownOption;

$factory->define(PropertyDropdownOption::class, function (Faker $faker) {
   $property = factory(\AvoRed\Framework\Catalog\Models\Property::class)->create([
       'field_type' => 'SELECT'
   ]);

    return [
        'property_id' => $property->id,
        'display_text' => $faker->title
    ];
});
