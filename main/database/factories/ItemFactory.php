<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker -> word,
        'description' => $faker -> sentence,
        'ingredients' => $faker -> word,
        'price' => rand(10,100),
        'available'=> rand(0,1),
        'deleted' => rand(0,1),
        'lactose'=> rand(0,1),
        'gluten' => rand(0,1),
    ];
});
