<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipe_id' => 1,
            'poster_name' => $this->faker->name(),
            'comment_text' => $this->faker->text(),
            'createdAt' => $this->faker->date(),
            'user_id' => 1,
            'rating' => 1,
            'approved' => true,
        ];
    }
}
