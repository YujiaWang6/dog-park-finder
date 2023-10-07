<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Park;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();
        $parkIds = Park::pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($userIds),
            'park_id' => $this->faker->randomElement($parkIds),
            'mark' => random_int(1, 5),
            'description' => $this->faker->paragraph,
        ];
    }
}
