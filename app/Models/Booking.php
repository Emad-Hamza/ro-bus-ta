<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'trip_id',
        'user_id',
        'seat_id',
        'start_id',
        'destination_id'
    ];
    /**
     * Get the trip that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    /**
     * Get the user that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the seat that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
    
    /**
    * Get the start associated with the Trip
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function start()
    {
        return $this->belongsTo(Station::class);
    }

    /**
     *  * Get the destination associated with the Trip
     * *
     * * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * 
     * */
    public function destination()
    {
        return $this->belongsTo(Station::class);
    }

    

}
