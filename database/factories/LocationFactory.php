<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Location::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'line_1' => $faker->streetAddress,
        'line_2' => $faker->city,
        'line_3' => $faker->state,
        'post_code' => $faker->postcode,
        'lat_long' => $faker->latitude().'-'.$faker->longitude(),
        'meta' => '{"google-id" : "3453453453"}',
    ];
});
