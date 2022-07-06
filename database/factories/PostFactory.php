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
    public function definition()
    {
        return [
            'user_id'     => 1,
            'title'       => fake()->title(),
            'description' => fake()->paragraph(4),
            'category_id' => 2,
            'photo'       => fake()->imageUrl(640,500, 'nature')
        ];
    }
}
