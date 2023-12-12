<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        return [
            'Title' => fake()->word(),
            'Description' => fake()->sentence(fake()-> numberBetween(1,25)),
            'date_of_post' => now(),
            'user_id' => fake()->numberBetween(1,50),
        ];
    }
}
