<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Tag;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TagTest extends TestCase
{
    use DatabaseMigrations;

    public function testFactoryCreatesTag()
    {
        $tag = factory(Tag::class)->create();
        $this->assertNotNull($tag->tag);
        $this->assertNotNull($tag->description);
    }

    public function testRestaurantHasTag()
    {
        $restaurant = factory(Restaurant::class)->create([
            'name' => 'Foo',
        ]);

        $tag = factory(Tag::class)->create([
            'tag' => 'Bar',
        ]);

        $tag->restaurants()->attach($tag);
        $this->assertEquals($tag->restaurants->first()->name, 'Foo');
    }

    public function testDishHasTag()
    {
        $dish = factory(Dish::class)->create([
            'name' => 'Foo',
        ]);

        $tag = factory(Tag::class)->create([
            'tag' => 'Bar',
        ]);

        $tag->dishes()->attach($tag);
        $this->assertEquals($tag->dishes->first()->name, 'Foo');
    }
}
