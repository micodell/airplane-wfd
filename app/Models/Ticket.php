<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    // protected $connection = 'mysql';
    // protected $table = 'tickets';
    protected $fillable = [
        'flight_id',
        'passanger_name',
        'passanger_phone',
        'seat_number',
        'is_boarding',
        'boarding_time'
    ];

    public function flights() {
        return $this->belongsTo(Flight::class);
    }

    public static $rules = [
        'passanger_name' => 'required | max:255',
        'passanger_phone' => 'required',
    ];

    public static $messages = [
        'passanger_name.required' => 'Please enter the passanger name',
        'passanger_name.max' => 'Name cannot be more than 255 characthers',
        'passanger_phone.required' => 'Please enter the passanger phone',
    ];
}
