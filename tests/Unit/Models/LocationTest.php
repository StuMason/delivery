<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Location;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class LocationTest extends TestCase
{
    use DatabaseMigrations;

    public function testFactoryCreatesLocation()
    {
        $location = factory(Location::class)->create();
        $this->assertNotNull($location->name);
        $this->assertNotNull($location->line_1);
        $this->assertNotNull($location->line_2);
        $this->assertNotNull($location->line_3);
        $this->assertNotNull($location->lat_long);
        $this->assertNotNull($location->meta);
    }

    public function testLocationCanHaveARestaurant()
    {
        $restaurant = factory(Restaurant::class)->create([
            'name' => 'Foo',
        ]);
        $location = factory(Location::class)->create();
        $restaurant->locations()->save($location);
        $this->assertEquals($location->locationable->first()->name, 'Foo');
    }

    public function testLocationCanHaveAUser()
    {
        $user = factory(User::class)->create([
            'name' => 'Bar',
        ]);
        $location = factory(Location::class)->create();
        $user->locations()->save($location);
        $this->assertEquals($location->locationable->first()->name, 'Bar');
    }
}
