<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Restaurant;

class RestaurantTest extends TestCase
{
    public function testFactoryCreatesRestaurant()
    {
        $restaurant = factory(Restaurant::class)->create();
        $this->assertNotNull($restaurant->name);
        $this->assertNotNull($restaurant->description);
        $this->assertNotNull($restaurant->minimum_order);
        $this->assertNotNull($restaurant->contact_number);
    }

    public function testRestaurantModelReturnsSingleModel()
    {
        $restaurant = factory(Restaurant::class)->create();
        $this->assertNotNull(Restaurant::find($restaurant->id));
    }
}
