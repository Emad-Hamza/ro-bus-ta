<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

/**
 * Get all of the trips for the Trip
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function subTrips(): HasMany
{
    return $this->hasMany(Trip::class, 'parent_trip_id');
}

/**
 * Get the start associated with the Trip
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function start(): HasOne
{
    return $this->hasOne(Station::class);
}

/**
 * Get the destination associated with the Trip
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function destination(): HasOne
{
    return $this->hasOne(Station::class);
}
    
}
