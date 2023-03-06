<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tin' => fake()->unique()->numerify('#########'),
            'name' => fake()->company(),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'phone_number' => fake()->phoneNumber(),
            'bank_account' => fake()->unique()->numerify('##################'),
            'email' => fake()->unique()->safeEmail(),

        ];
    }
}
