<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StationsTrip extends Model
{
    protected $fillable = [
        'trip_id',
        'station_id',
        'station_order',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/stations-trips/'.$this->getKey());
    }
}
