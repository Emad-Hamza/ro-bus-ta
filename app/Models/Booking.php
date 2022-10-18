<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * Get the trip that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }

    /**
     * Get the user that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the seat that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seat(): BelongsTo
    {
        return $this->belongsTo(Seat::class);
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
