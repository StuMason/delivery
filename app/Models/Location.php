<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'line_1',
        'line_2',
        'line_3',
        'post_code',
        'lat_long',
        'meta',
    ];

    /**
     * Get all of the owning locationable models.
     */
    public function locationable()
    {
        return $this->morphTo();
    }
}
