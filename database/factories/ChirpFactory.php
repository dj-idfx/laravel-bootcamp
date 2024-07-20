<?php

namespace Database\Factories;

use App\Models\Chirp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Chirp>
 */
class ChirpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_date = fake()->dateTimeBetween('-1 years');

        return [
            'message' => fake()->paragraph(2),
            'created_at' => $created_date,
            'updated_at' => $created_date,
        ];
    }
}
