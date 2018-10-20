<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RestaurantTest extends TestCase
{
    use DatabaseMigrations;

    public function testFactoryCreatesRestaurant()
    {
        $restaurant = factory(Restaurant::class)->create();
        $this->assertNotNull($restaurant->name);
        $this->assertNotNull($restaurant->description);
        $this->assertNotNull($restaurant->minimum_order);
        $this->assertNotNull($restaurant->contact_number);
        $this->assertNotNull($restaurant->open);
        $this->assertNotNull($restaurant->opening_times);
        $this->assertNotNull($restaurant->status);
    }

    public function testRestaurantModelReturnsSingleModel()
    {
        $restaurant = factory(Restaurant::class)->create();
        $this->assertNotNull(Restaurant::find($restaurant->id));
    }
}
