<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id'     => fake()->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'title'       => fake()->sentence(7, true),
            'description' => fake()->paragraph(50),
            'category_id' => fake()->randomElement([1,2,3]),
            'thumbnail_s' => fake()->imageUrl(100,100, 'nature'),
            'thumbnail_m' => fake()->imageUrl(320,210, 'nature'),
            'thumbnail_l' => fake()->imageUrl(512,334, 'nature'),
            'thumbnail_el'=> fake()->imageUrl(1947,843, 'nature'),
            'visitor'     => fake()->randomDigit(),
        ];
    }
}
