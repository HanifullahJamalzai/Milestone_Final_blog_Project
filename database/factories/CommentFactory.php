<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'           => fake()->randomElement([1,2,3,4,5,6,7,8,9,10]),
            'post_id'           => fake()->numberBetween(1,50),
            'comment_description' => fake()->paragraph(2),
        ];
    }
}
