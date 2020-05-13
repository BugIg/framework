<?php

use Faker\Generator as Faker;
use AvoRed\Framework\Catalog\Models\Product;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->sentence;
    $price = $faker->numberBetween(100, 300);
    return [
        'type' => 'BASIC',
        'name' => $name,
        'slug' => Str::slug($name),
        'sku' => 'SKU' . $faker->numberBetween(50, 2000),
        'barcode' => $faker->numberBetween(1000000, 99999999999),  
        'description' => $faker->sentence,
        'status' => 1,
        'in_stock' => 1,
        'track_stock' => 1,
        'qty' => $faker->numberBetween(30, 99),
        'price' => $price,
        'cost_price' => $price - $faker->numberBetween(50, 99),
        'weight' => $faker->numberBetween(0, 100),
        'width' => $faker->numberBetween(0, 100),
        'height' => $faker->numberBetween(0, 100),
        'length' => $faker->numberBetween(0, 100)
    ];
});
