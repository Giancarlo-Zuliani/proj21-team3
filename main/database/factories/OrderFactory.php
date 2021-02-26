<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker -> firstName,
        'lastname' => $faker ->lastName,
        'address' => $faker -> address,
        'phone_num' => $faker ->phoneNumber,
        'email' => $faker -> email,
        'payment_status' => rand(0,1),
        'discount' => rand(10,40),
        'total_price' => rand(50,250),
        'final_price' => rand(50,250),
    ];
});
