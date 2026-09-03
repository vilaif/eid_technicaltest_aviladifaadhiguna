<?php

namespace Database\Factories;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Machine>
 */
class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->bothify('##??'),
            'type' => $this->faker->randomElement(['CNC', 'Milling', 'Press', 'Assembly']),
            'status' => $this->faker->randomElement(['Running', 'Idle', 'Maintenance', 'Error']),
            'current_temperature' => $this->faker->randomFloat(2, 40, 90),
        ];
    }
}