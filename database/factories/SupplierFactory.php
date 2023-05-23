<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Traits\HasRandomOIB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
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
            'name' => fake()->company(),
            'email' => fake()->unique()->safeEmail,
            'phone' => fake()->phoneNumber,
            'oib' => $this->randomOIB(),
            'address' => fake()->streetAddress(),
            'city' => fake()->city()
        ];
    }
}
