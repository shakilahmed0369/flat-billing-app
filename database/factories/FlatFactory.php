<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flat>
 */
class FlatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'flat_name' => fake()->word(),
            'flat_bill' => fake()->randomNumber(),
            'per_unit_cost' => fake()->randomNumber(),
            'gass_bill' => fake()->randomNumber(),
            'garage_bill' => fake()->randomNumber(),
            'maid_bill' => fake()->randomNumber(),
            'rubbish_bill' => fake()->randomNumber(),

        ];
    }
}
