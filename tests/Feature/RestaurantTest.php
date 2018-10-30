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
        $restuarant = [
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

        $response = $this->post('/restaurants/create', $restuarant);
        $response->assertStatus(200);
        $response->assertSeeText($restaurant->name);
    }

    // public function testRestaurantStoreValidation()
    // {
    //     $restuarant = [
    //         'name' => 'Fo',
    //         'description' => 'Restaurant',
    //         'minimum_order' => 'string',
    //         'contact_number' => 3,
    //         'status' => 'not-in-list', //verified - pending - shut
    //         'open' => 4,
    //     ];
    //     $response = $this->json('POST', '/api/v1/restaurants', $restuarant);
    //     $content = json_decode($response->getContent());
    //     $this->assertEquals('The given data was invalid.', $content->message);
    // }

    // public function testRestaurantShow()
    // {
    //     $restaurant = factory(Restaurant::class)->create(['name' => 'Bar']);
    //     $response = $this->json('GET', "/api/v1/restaurants/{$restaurant->id}");
    //     $response->assertStatus(200);
    //     $content = json_decode($response->getContent());
    //     $this->assertEquals('Bar', $content->data->name, 'Unable to show the created restaurant');
    // }
}
