<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operator>
 */
class OperatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'sifra' => fake()->numberBetween(1, 100),
            'email' => fake()->unique()->safeEmail,
            'password' => bcrypt('admin'),
            'partner_id' => fake()->numberBetween(1, 10)
        ];
    }
}
