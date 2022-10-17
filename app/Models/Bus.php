<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    /**
     * Get all of the seats for the Bus
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seats(): HasMany
    {
        return $this->hasMany(Seat::class);
    }
}
