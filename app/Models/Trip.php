<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bus_id'
    ];

/**
 * Get the bus that owns the Trip
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function bus(): BelongsTo
{
    return $this->belongsTo(Bus::class);
}

/**
 * Get all of the bookings for the Trip
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function bookings(): HasMany
{
    return $this->hasMany(Booking::class);
}

/**
 * The stations that belong to the Trip
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function stations(): BelongsToMany
{
    return $this->belongsToMany(Station::class);
}




    
}
