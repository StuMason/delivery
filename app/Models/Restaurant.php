<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'minimum_order',
        'contact_number',
        'status',
        'open',
    ];

    /**
     * Get all of the restaurant's locations.
     */
    public function locations()
    {
        return $this->morphMany(Location::class, 'locationable');
    }

    /**
     * Get all of the restaurant's opening times.
     */
    public function openingTimes()
    {
        return $this->hasMany(OpeningTimes::class);
    }

    /**
     * Get the dishes for the restaurant.
     */
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    /**
     * The tags associated with this restaurant.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * The user associated with this restaurant.
     */
    public function owners()
    {
        return $this->belongsToMany(User::class);
    }
}
