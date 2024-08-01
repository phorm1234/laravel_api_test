<?php

namespace Database\Factories;

use App\Models\ParkingSlot;
use App\Models\ParkingLot;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParkingSlot>
 */
class ParkingSlotFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     *
     * @return array<string, mixed>
     */
    protected $model = ParkingSlot::class;

    public function definition()
    {
        return [
            'slot_number' => $this->faker->unique()->numerify('Slot ###'),
            'parking_lot_id' => ParkingLot::factory(),
            'is_available' => $this->faker->boolean(80), // 80% chance of being available
        ];
    }
}