<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    // protected $connection = 'mysql';
    // protected $table = 'flights';
    protected $fillable = [
        'flight_code',
        'origin',
        'destination',
        'departure_time',
        'arrival_time'
    ];

    public function tickets() {
        return $this->hasMany(Ticket::class, 'flight_id');
    }
}
