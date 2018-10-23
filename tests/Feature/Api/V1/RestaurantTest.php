<?php

namespace Tests\Feature\Api\V1;

use Tests\TestCase;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RestaurantTest extends TestCase
{
    use DatabaseMigrations;

    public function testRestaurantIndex()
    {
        factory(Restaurant::class, 10)->create();
        $response = $this->json('GET', '/api/v1/restaurants');
        $response->assertStatus(200);
        $content = json_decode($response->getContent());
        $this->assertEquals(10, $content->total, 'Unable to get all 10 restuarant seeds');
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
            'opening_times' => '{"monday" : ["10-11", "5-7"], "tuesday" : ["10-11", "5-7"]}',
        ];
        $response = $this->json('POST', '/api/v1/restaurants', $restuarant);
        $response->assertStatus(200);
        $content = json_decode($response->getContent());
        $this->assertEquals('Foo', $content->data->name, 'Unable to save posted restaurant');
    }

    public function testRestaurantStoreValidation()
    {
        $restuarant = [
            'name' => 'Fo',
            'description' => 'Restaurant',
            'minimum_order' => 'string',
            'contact_number' => 3,
            'status' => 'not-in-list', //verified - pending - shut
            'open' => 4,
        ];
        $response = $this->json('POST', '/api/v1/restaurants', $restuarant);
        $content = json_decode($response->getContent());
        $this->assertEquals('The given data was invalid.', $content->message);
    }

    public function testRestaurantShow()
    {
        $restaurant = factory(Restaurant::class)->create(['name' => 'Bar']);
        $response = $this->json('GET', "/api/v1/restaurants/{$restaurant->id}");
        $response->assertStatus(200);
        $content = json_decode($response->getContent());
        $this->assertEquals('Bar', $content->data->name, 'Unable to show the created restaurant');
    }
}
