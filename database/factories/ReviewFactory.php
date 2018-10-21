<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Order;

$factory->define(App\Models\Review::class, function (Faker $faker) {
    return [
        'rating' => $faker->numberBetween(1, 10),
        'review' => $faker->paragraph(1),
        'reply' => $faker->paragraph(1),
        'online' => $faker->boolean,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'restaurant_id' => function () {
            return factory(Restaurant::class)->create()->id;
        },
        'order_id' => function () {
            return factory(Order::class)->create()->id;
        },
    ];
});
