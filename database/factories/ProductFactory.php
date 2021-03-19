<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'description' => $faker->text(20),
        'quantity' => $faker->numberBetween(1, 40),
        'price' => $faker->numberBetween(50, 100),
        'image' => 'images/icon/homecare.png',
        'status' => 'AVAILABLE',
    ];
});
