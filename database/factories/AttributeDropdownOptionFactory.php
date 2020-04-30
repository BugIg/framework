<?php

use Faker\Generator as Faker;
use AvoRed\Framework\Catalog\Models\AttributeDropdownOption;
use AvoRed\Framework\Catalog\Models\Attribute;

$factory->define(AttributeDropdownOption::class, function (Faker $faker) {
    $attribute = factory(Attribute::class)->create();

    return [
        'attribute_id' => $attribute->id,
        'display_text' => $faker->sentence
    ];
});
