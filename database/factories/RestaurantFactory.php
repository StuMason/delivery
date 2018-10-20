<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence(),
        'minimum_order' => $faker->randomFloat(2, 0, 15),
        'contact_number' => $faker->phoneNumber,
    ];
});
