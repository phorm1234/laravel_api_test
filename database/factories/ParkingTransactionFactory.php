<?php

namespace Database\Factories;
use App\Models\ParkingTransaction;
use App\Models\ParkingSlot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParkingTransaction>
 */
class ParkingTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ParkingTransaction::class;

    public function definition()
    {
        $checkIn = $this->faker->dateTimeBetween('-1 days', 'now');
        $checkOut = $this->faker->dateTimeBetween($checkIn, 'now');
        $totalMinutes = $checkIn->diff($checkOut)->i;
        $hourlyRate = $this->faker->randomFloat(2, 1, 5);

        $freeMinutes = 15; // Assuming 15 minutes free
        $billableMinutes = max(0, $totalMinutes - $freeMinutes);
        $totalCost = ceil($billableMinutes / 60) * $hourlyRate;

        return [
            'slot_id' => ParkingSlot::factory(),
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'total_cost' => $totalCost,
        ];
    }
}