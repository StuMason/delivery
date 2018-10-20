<?php

use Faker\Generator as Faker;
use App\Models\Restaurant;

$factory->define(App\Models\Dish::class, function (Faker $faker) {
    return [
        'restaurant_id' => function () {
            return factory(Restaurant::class)->create()->id;
        },
        'name' => $faker->word,
        'description' => $faker->sentence(),
        'price' => $faker->randomFloat(2, 1.99, 22),
        'available' => true,
    ];
});
