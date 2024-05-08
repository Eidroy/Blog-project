<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipes>
 */
class RecipesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Recipe_name' => $this->faker->word,
            'creator' => 'luisa58',
            'likes' => $this->faker->randomNumber(),
            'TimetoCook' => $this->faker->word,
            'Timetoprepare' => $this->faker->word,
            'category' => $this->faker->word,
            'cuisine' => $this->faker->word,
            'servings' => $this->faker->randomNumber(),
            'ingredients' => "{\"eggs\": \"2\", \"butter\": \"10gr\", \"bacon\": \"3 strips\"}",
            'Nutritional_values' => "{\"eggs\": \"2\", \"butter\": \"10gr\", \"bacon\": \"3 strips\"}",
            'search_keywords' => "{\"keyword1\": \"value1\", \"keyword2\": \"value2\", \"keyword3\": \"value3\"}",
            'detail_id' => 1,
        ];
    }
}
