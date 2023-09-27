<?php

namespace Database\Factories;

use App\Enums\FuelHistoryType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FuelHistory>
 */
class FuelHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->numberBetween(1, 100),
            'type' => $this->faker->randomElement(FuelHistoryType::all()),
            'history_at' => $this->faker->dateTimeBetween('-1 month'),
        ];
    }
}
