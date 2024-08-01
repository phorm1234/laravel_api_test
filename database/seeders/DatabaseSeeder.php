<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ParkingLot;
use App\Models\ParkingSlot;
use App\Models\ParkingPriceRate;
use App\Models\ParkingTransaction;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create 10 parking lots
        // ParkingLot::factory()
        // ->count(10)
        // ->has(ParkingSlot::factory()->count(50)) // Each lot has 50 slots
        // ->has(ParkingPriceRate::factory()->count(1)) // Each lot has 1 rate
        // ->create();

        $this->call([
            ParkingLotSeeder::class,
            ParkingSlotSeeder::class,
        ]);


        // // Create 100 transactions
        // ParkingTransaction::factory()->count(100)->create();
        // // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}