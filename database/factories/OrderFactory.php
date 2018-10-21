<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Location;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'restaurant_id' => function () {
            return factory(Restaurant::class)->create()->id;
        },
        'location_id' => function () {
            return factory(Location::class)->create()->id;
        },
        'total' => $faker->randomFloat(2, 12, 54),
        'type' => $faker->randomElement(['delivery', 'collection']),
        'status' => $faker->randomElement(['queued', 'confirmed', 'cancelled', 'ready', 'complete']),
    ];
});
