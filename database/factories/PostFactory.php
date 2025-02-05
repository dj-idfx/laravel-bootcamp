<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
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
            'title' => fake()->realText(48),
            'content' => fake()->paragraphs(8, true),
            'created_at' => $created_date,
            'updated_at' => $created_date,
        ];
    }
}
