<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Tag;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DishTest extends TestCase
{
    use DatabaseMigrations;

    public function testFactoryCreatesDish()
    {
        $dish = factory(Dish::class)->create();
        $this->assertNotNull($dish->name);
        $this->assertNotNull($dish->restaurant_id);
        $this->assertNotNull($dish->description);
        $this->assertNotNull($dish->price);
        $this->assertNotNull($dish->available);
        $this->assertNotNull($dish->restaurant->name);
    }

    public function testDishBelongsToRestaurant()
    {
        $restaurant = factory(Restaurant::class)->create([
            'name' => 'Foo',
        ]);

        $dish = factory(Dish::class)->create([
            'name' => 'Bar',
        ]);

        $restaurant->dishes()->save($dish);
        $this->assertEquals($restaurant->dishes->first()->name, 'Bar');
    }

    public function testDishCanBeAssignedTag()
    {
        $dish = factory(Dish::class)->create([
            'name' => 'Foo',
        ]);

        $tag = factory(Tag::class)->create([
            'tag' => 'Bar',
        ]);

        $dish->tags()->attach($tag);
        $this->assertEquals($dish->tags->first()->tag, 'Bar');
    }
}
