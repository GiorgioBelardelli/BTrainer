<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake() -> name(),
            'surname' => fake() -> name(), //da fixare con il cognome
            'review_date' => fake() -> date(),
            'review_content' => fake() -> sentence(),
            'vote' => fake() -> numberBetween(1, 5),
        ];
    }
}
