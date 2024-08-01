<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ParkingLot; 
use App\Models\ParkingPriceRate; 
class ParkingLotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parkingLots = [
            [
                'name' => 'CentralPlaza WestGate',
                'latitude' => 13.875692,
                'longitude' => 100.411446,
                'free_minutes' => 15,
                'hourly_rate' => 30.00,
            ],
            [
                'name' => 'Parking Zone 96 จอดสบาย',
                'latitude' => 14.7924715,
                'longitude' => 108.3869286,
                'free_minutes' => 20,
                'hourly_rate' => 20.00,
            ],
            [
                'name' => 'เดอะวอล์ค ราชพฤกษ์',
                'latitude' => 17.8213071,
                'longitude' => 110.4085291,
                'free_minutes' => 30,
                'hourly_rate' => 25.00,
            ],

        ];

        
           foreach ($parkingLots as $lot) {
            $parkingLot = ParkingLot::create([
                'name' => $lot['name'],
                'latitude' => $lot['latitude'],
                'longitude' => $lot['longitude'],
                'free_minutes' => $lot['free_minutes'],
            ]);

            // เพิ่มข้อมูลราคาจอดรถ
            ParkingPriceRate::create([
                'parking_lot_id' => $parkingLot->id,
                'hourly_rate' => $lot['hourly_rate'],
            ]);
        }

    }
}