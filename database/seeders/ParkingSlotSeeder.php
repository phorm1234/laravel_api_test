<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ParkingLot; 
use App\Models\ParkingPriceRate; 
use App\Models\ParkingSlot; 
class ParkingSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parkingLots = ParkingLot::all();

        foreach ($parkingLots as $parkingLot) {
            foreach (range(1, 10) as $number) {
                ParkingSlot::create([
                    'slot_number' => 'A' . $number,
                    'parking_lot_id' => $parkingLot->id,
                    'is_available' => true,
                ]);

                ParkingSlot::create([
                    'slot_number' => 'B' . $number,
                    'parking_lot_id' => $parkingLot->id,
                    'is_available' => true,
                ]);
            }

            echo "Inserted slots for: " . $parkingLot->name . "\n";
        }
    }
}