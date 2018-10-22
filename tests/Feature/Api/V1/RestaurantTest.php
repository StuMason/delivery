<?php

namespace Tests\Feature;

use Tests\TestCase;

class RestaurantTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testGetRestaurantIndex()
    {
        $response = $this->get('/api/v1/restaurants');
        $response->assertStatus(200);
    }
}
