<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'detail' => fake()->paragraph($nbSentences = 5, $variableNbSentences = true),
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 1, $max = NULL) // 48.8932
        ];
    }
}