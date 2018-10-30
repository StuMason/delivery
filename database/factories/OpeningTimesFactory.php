<?php

use Faker\Generator as Faker;
use App\Models\Restaurant;

$factory->define(App\Models\OpeningTimes::class, function (Faker $faker) {
    return [
        'restaurant_id' => function () {
            return factory(Restaurant::class)->create()->id;
        },
        'day' => $faker->randomElement(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']),
        'closed' => false,
        'open' => $faker->time(),
        'close' => $faker->time(),
    ];
});
