<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'buyer_name' => $faker -> firstName,
        'buyer_lastname' => $faker ->lastName,
        'address' => $faker -> address,
        'phone_num' => $faker ->phoneNumber,
        'email' => $faker -> email,
        'discount' => rand(10,40),
        'total_price' => rand(50,250),
        'final_price' => rand(20,50),
        'payment_status' => rand(0,1),
    ];
});
