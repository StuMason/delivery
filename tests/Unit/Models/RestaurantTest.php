<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Tag;
use App\Models\Dish;
use App\Models\Location;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\OpeningTimes;

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
        $this->assertNotNull($restaurant->status);
    }

    public function testRestaurantModelReturnsSingleModel()
    {
        $restaurant = factory(Restaurant::class)->create();
        $this->assertNotNull(Restaurant::find($restaurant->id));
    }

    public function testRestaurantIsLocationable()
    {
        $restaurant = factory(Restaurant::class)->create();
        $location = factory(Location::class)->create([
            'line_3' => 'Foo',
        ]);
        $restaurant->locations()->save($location);
        $this->assertEquals($restaurant->locations->first()->line_3, 'Foo');
    }

    public function testRestaurantHasDishes()
    {
        $restaurant = factory(Restaurant::class)->create();
        $dishes = factory(Dish::class, 10)->create();
        $restaurant->dishes()->saveMany($dishes);
        $this->assertEquals($restaurant->dishes->count(), 10);
    }

    public function testTagCanBeAssignedToRestaurant()
    {
        $restaurant = factory(Restaurant::class)->create([
            'name' => 'Foo',
        ]);

        $tag = factory(Tag::class)->create([
            'tag' => 'Bar',
        ]);

        $tag->restaurants()->attach($tag);
        $this->assertEquals($restaurant->tags->first()->tag, 'Bar');
    }

    public function testRestaurantHasOwner()
    {
        $restaurant = factory(Restaurant::class)->create([
            'name' => 'Foo',
        ]);

        $user = factory(User::class)->create([
            'name' => 'Bar',
        ]);

        $restaurant->owners()->attach($user);
        $this->assertEquals($restaurant->owners->first()->name, 'Bar');
    }

    public function testRestaurantHasOpeningTimes()
    {
        $restaurant = factory(Restaurant::class)->create([
            'name' => 'Foo',
        ]);

        $openingTimes = factory(OpeningTimes::class, 7)->create();

        $restaurant->openingTimes()->saveMany($openingTimes);
        $this->assertNotNull($restaurant->openingTimes->first()->day);
    }
}
