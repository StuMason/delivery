<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RestaurantTest extends TestCase
{
    use DatabaseMigrations;

    public function testRestaurantIndex()
    {
        factory(Restaurant::class, 10)->create();
        $response = $this->get('/restaurants');
        $response->assertStatus(200);
        $response->assertSeeText('Restaurants');
    }

    public function testRestaurantShow()
    {
        $restaurant = factory(Restaurant::class)->create();
        $response = $this->get("/restaurants/{$restaurant->id}");
        $response->assertStatus(200);
        $response->assertSeeText($restaurant->name);
    }

    public function testRestaurantStore()
    {
        $restaurant = [
            'name' => 'Foo',
            'description' => 'This is a good restaurant',
            'minimum_order' => 5,
            'contact_number' => '01303 445 677',
            'status' => 'pending', //verified - pending - shut
            'open' => 0,
            'openingTimes' => [
                'monday' => ['open' => 11, 'close' => 11],
                'tuesday' => ['closed' => 'on'],
                'wednesday' => ['open' => 11, 'close' => 11],
                'thursday' => ['open' => 11, 'close' => 11],
                'friday' => ['open' => 11, 'close' => 11],
                'saturday' => ['open' => 11, 'close' => 11],
                'sunday' => ['open' => 11, 'close' => 11],
            ],
        ];

        $response = $this->post('/restaurants', $restaurant);
        $response->assertStatus(302);
        $response->assertRedirect('/restaurants/1');
    }

    public function testRestaurantStoreValidation()
    {
        $restuarant = [
            'name' => 'Fo',
            'description' => 'Restaurant',
            'minimum_order' => 'string',
            'status' => 'not-in-list', //verified - pending - shut
s,        ];

        $response = $this->post('/restaurants', $restuarant);
    }
}
