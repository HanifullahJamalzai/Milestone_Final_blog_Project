<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
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
            'comment_id'        => fake()->numberBetween(1,2000),
            'reply_description' => fake()->paragraph(2),
        ];
    }
}
