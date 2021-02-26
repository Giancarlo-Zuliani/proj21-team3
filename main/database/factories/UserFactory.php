<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker-> company,
        'address' => $faker -> city,
        'vat_num' =>  rand(000000,999999),
        'phone_num' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'start_delivery' => $faker -> time($format = 'H:i:s'),
        'end_delivery' => $faker -> time($format = 'H:i:s'),
        'price_delivery' => rand(1,8),
        'lat' =>$faker -> latitude($min = -90, $max = 90),
        'long' => $faker -> longitude($min = -180, $max = 180),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
