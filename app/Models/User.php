<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the user's locations.
     */
    public function locations()
    {
        return $this->morphMany(Location::class, 'locationable');
    }

    /**
     * Get all of the user's restaurants.
     */
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
