<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'restaurant_id',
        'location_id',
        'type',
        'total',
        'status',
    ];

    /**
     * The customer associated with this order.
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The restaurant associated with this order.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * Get all of the restaurant's locations.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Get the dishes for the order.
     */
    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
