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
            'thumbnail_s'       => fake()->imageUrl(100,100, 'nature'),
            'thumbnail_m'       => fake()->imageUrl(320,210, 'nature'),
            'thumbnail_l'       => fake()->imageUrl(512,334, 'nature'),
            'thumbnail_el'       => fake()->imageUrl(1947,843, 'nature'),
            'visitor'      => 2,
        ];
    }
}
