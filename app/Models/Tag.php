<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag',
        'description',
    ];

    /**
     * The restuarants that have to the tag.
     */
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    /**
     * The restuarants that have to the tag.
     */
    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
