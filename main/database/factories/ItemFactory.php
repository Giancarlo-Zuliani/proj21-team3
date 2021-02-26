<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'description' => $faker -> sentence,
        'ingredients' => $faker -> word,
        'photo' => $faker -> word,
        'price' => rand(10,100),
        'available'=> rand(0,1), 
    ];
});
