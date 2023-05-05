<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'naziv' => fake()->company(),
            'email' => fake()->unique()->safeEmail,
            'telefon' => fake()->phoneNumber,
            'oib' => $this->generateRandomDigits(),
        ];
    }

    private function generateRandomDigits() {
        $digits = '';
        for ($i = 0; $i < 11; $i++) {
            $digits .= mt_rand(0, 9);
        }
        return $digits;
    }
}
