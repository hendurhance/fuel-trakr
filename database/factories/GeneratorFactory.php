<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Generator>
 */
class GeneratorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $capacity = $this->faker->numberBetween(1, 100);
        return [
            'name' => $this->faker->randomElement(['Honda Generator', 'Mikano Generator', 'Yamaha Generator']),
            'capacity' => $capacity,
            'current_level' => $this->faker->numberBetween(0, $capacity),
        ];
    }
}
