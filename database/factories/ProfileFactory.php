<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'phone_number' => fake() -> phoneNumber(), 
            'photo' => 'https://picsum.photos/seed/picsum/200/300',
            'curriculum' => 'https://picsum.photos/seed/picsum/400/600',
            'plan_program' => fake() -> paragraph(2),
            'work_address' => fake()-> streetAddress(),
        ];
    }
}
