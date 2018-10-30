<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningTimes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id',
        'day',
        'closed',
        'open',
        'close',
    ];

    /**
     * Get the restaurant that owns the opening time.
     */
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
