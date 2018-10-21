<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Restaurant;
use App\Models\Location;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function testFactoryCreatesUser()
    {
        $user = factory(User::class)->create();
        $this->assertNotNull($user->name);
        $this->assertNotNull($user->eamil);
    }

    public function testUserOwnsRestaurant()
    {
        $restaurant = factory(Restaurant::class)->create([
            'name' => 'Foo',
        ]);

        $user = factory(User::class)->create([
            'name' => 'Bar',
        ]);

        $user->restaurants()->attach($restaurant);
        $this->assertEquals($user->restaurants->first()->name, 'Foo');
    }

    public function testUserIsLocationable()
    {
        $user = factory(User::class)->create();
        $location = factory(Location::class)->create([
            'line_3' => 'Foo',
        ]);
        $user->locations()->save($location);
        $this->assertEquals($user->locations->first()->line_3, 'Foo');
    }
}
