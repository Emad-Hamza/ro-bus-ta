<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * The trips that belong to the Station
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trips(): BelongsToMany
    {
        return $this->belongsToMany(Trips::class, 'role_user_table', 'user_id', 'role_id');
    }

    

    
}
