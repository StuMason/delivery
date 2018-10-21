<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OrderTest extends TestCase
{
    use DatabaseMigrations;

    public function testFactoryCreatesOrder()
    {
        $order = factory(Order::class)->create();
        $this->assertNotNull($order->total);
        $this->assertNotNull($order->restaurant->name);
        $this->assertNotNull($order->customer->name);
        $this->assertNotNull($order->location->line_2);
    }

    public function testRestaruantCanHaveDishes()
    {
        $order = factory(Order::class)->create();
        $dishes = factory(Dish::class, 10)->create();
        $order->dishes()->attach($dishes);
        $this->assertEquals(10, $order->dishes->count());
    }
}
