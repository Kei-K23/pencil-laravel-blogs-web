<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author_id' => \App\Models\User::factory(),
            'content' => fake()->paragraph(10),
            'view_count' => fake()->numberBetween(2, 50),
            'likes_count' => fake()->numberBetween(1, 40),
        ];
    }
}
