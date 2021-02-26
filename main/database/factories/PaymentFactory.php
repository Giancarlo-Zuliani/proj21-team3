<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
       'final_price' => rand(20,50),
       'payment_method' => $faker -> word,
       'payment_status' => rand(0,1),
    ];
});
