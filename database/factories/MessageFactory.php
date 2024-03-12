<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'name'=> fake()->name(),
        'surname'=> fake()->name(), // da fixare con cognome
        'message_date'=> fake()-> date(),
        'message_content'=> fake()-> paragraph(),
        'email'=> fake()->email(),
        ];
    }
}
