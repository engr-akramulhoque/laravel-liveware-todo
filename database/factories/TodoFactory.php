<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'date' => $this->faker->date('Y-m-d'),
            'from' => $this->faker->time('H:i A'),
            'to' => $this->faker->time('H:i A'),
            'status' => $this->faker->randomElement(['pending', 'completed', 'scheduled', 'in-progress']),
            'user_id' => 1,
        ];
    }
}
