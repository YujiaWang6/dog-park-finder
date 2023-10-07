<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Park>
 */
class ParkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'park_name' => $this->faker->sentence,
            'address' => $this->faker->sentence,
            'postcode' => $this->faker->sentence,
            'latitude' => $this->faker->randomNumber(2),
            'longitude' => $this->faker->randomNumber(2),
            'city' => $this->faker->sentence,
        ];
    }
}
