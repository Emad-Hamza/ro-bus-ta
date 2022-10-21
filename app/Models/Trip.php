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
public function bus()
{
    return $this->belongsTo(Bus::class);
}

/**
 * Get all of the bookings for the Trip
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function bookings()
{
    return $this->hasMany(Booking::class);
}

/**
 * The stations that belong to the Trip
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function stations()
{
    return $this->belongsToMany(Station::class, 'stations_trips')->withPivot('station_order');
}

// public function stationsInRange($start, $destination)
// {
//     return $this->belongsToMany(Station::class)
//                 ->wherePivotIn('id', [$start, $destination]);

// }



    
}
