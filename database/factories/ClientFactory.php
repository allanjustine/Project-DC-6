<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => fake()->firstName,
            'first_name' => fake()->lastName,
            'address' => fake()->address,
            'phone' => fake()->phoneNumber,
            'credit_limit' => fake()->numberBetween(3000,20000)
        ];
    }
}
