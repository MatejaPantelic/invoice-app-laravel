<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnitOfMeasure>
 */
class UnitOfMeasureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> fake()->randomElement(['--', 'kom', 'kg', 'gr', 'm', 'l', 'm2', 'B', 'KB', 'MB', 'GB', 'TB'])
            ];
    }
}
