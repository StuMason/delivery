<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence(),
        'minimum_order' => $faker->randomFloat(2, 0, 15),
        'contact_number' => $faker->phoneNumber,
        'status' => 'verified', //verified - pending - shut
        'open' => true,
        'opening_times' => '{"monday" : ["10-11", "5-7"], "tuesday" : ["10-11", "5-7"]}',
    ];
});
