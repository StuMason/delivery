<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rating',
        'review',
        'reply',
        'online',
        'user_id',
        'restaurant_id',
        'order_id',
    ];

    /**
     * The restaurant associated with this order.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * The user associated with this review.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The order associated with this review.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
