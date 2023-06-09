<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Traits\HasRandomOIB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    use HasRandomOIB;
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
            'oib' => $this->randomOIB(),
            'adresa' => fake()->streetAddress(),
            'mjesto' => fake()->city()
        ];
    }

}
