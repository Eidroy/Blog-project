<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe_details>
 */
class Recipe_detailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content1' => $this->faker->word,
            'content2' => $this->faker->word,
            'content3' => $this->faker->word,
            'content4' => $this->faker->word,
            'image1' => $this->faker->word,
            'image2' => $this->faker->word,
            'image3' => $this->faker->word,
            'image4' => $this->faker->word,
        ];
    }
}
