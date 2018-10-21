<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'restaurant_id',
        'name',
        'description',
        'price',
        'available',
    ];

    /**
     * Get the restaurant that owns the dish.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * The tags associated with this dish.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * The orders associated with this dish.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
