<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Flight::create([
            'flight_code' => 'JT610',
            'origin' => 'SUB',
            'destination' => 'JKT',
            'departure_time' => '2025-04-10 16:08:23',
            'arrival_time' => '2025-04-10 22:08:23'
        ]);
        Flight::create([
            'flight_code' => 'GA610',
            'origin' => 'SUB',
            'destination' => 'JKT',
            'departure_time' => '2025-04-10 16:24:00',
            'arrival_time' => '2025-04-10 21:09:05'
        ]);
        Flight::create([
            'flight_code' => 'AA024',
            'origin' => 'JKT',
            'destination' => 'MND',
            'departure_time' => '2025-04-12 21:11:02',
            'arrival_time' => '2025-04-13 04:10:02'
        ]);
        Flight::create([
            'flight_code' => 'GP999',
            'origin' => 'PTK',
            'destination' => 'JKT',
            'departure_time' => '2025-04-10 16:08:23',
            'arrival_time' => '2025-04-10 22:08:23'
        ]);
        Flight::create([
            'flight_code' => 'CT369',
            'origin' => 'SUB',
            'destination' => 'KLM',
            'departure_time' => '2025-04-24 16:08:23',
            'arrival_time' => '2025-04-25 09:08:23'
        ]);
    }
}
