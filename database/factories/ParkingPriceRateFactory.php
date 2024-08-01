<?php

namespace Database\Factories;

use App\Models\ParkingPriceRate;
use App\Models\ParkingLot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParkingPriceRate>
 */
class ParkingPriceRateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ParkingPriceRate::class;

    public function definition()
    {
        return [
            'parking_lot_id' => ParkingLot::factory(),
            'hourly_rate' => $this->faker->randomFloat(2, 1, 5),
        ];
    }
}