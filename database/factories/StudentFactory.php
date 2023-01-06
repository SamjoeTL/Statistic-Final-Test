<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'NIM' => $this->faker->unique()->randomNumber(),
            'name' => $this->faker->name(),
            'score' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}