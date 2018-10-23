<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    /**
     * Validation Array.
     *
     * @var array
     */
    public static $validation = [
        'name' => 'required|string|min:3',
        'description' => 'required|string|min:10',
        'minimum_order' => 'integer',
        'contact_number' => 'required',
        'status' => 'in:verfied,pending,shut',
        'open' => 'boolean',
        'opening_times' => 'required',
    ];

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
        'opening_times',
    ];

    /**
     * Get all of the restaurant's locations.
     */
    public function locations()
    {
        return $this->morphMany(Location::class, 'locationable');
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
