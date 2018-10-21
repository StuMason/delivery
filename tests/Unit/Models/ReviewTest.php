<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Review;

class ReviewTest extends TestCase
{
    use DatabaseMigrations;

    public function testFactoryCreatesReview()
    {
        $review = factory(Review::class)->create();
        $this->assertNotNull($review->rating);
        $this->assertNotNull($review->restaurant->name);
        $this->assertNotNull($review->user->name);
        $this->assertNotNull($review->order->total);
    }
}
