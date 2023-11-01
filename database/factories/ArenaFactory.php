<?php

namespace Database\Factories;

use App\Models\Arena;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Arena>
 */
class ArenaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => getUniqueNumber(new Arena, 'name'),
            'max_users' => fake()->numberBetween(2, User::count()),
            'status_id' => 3, // completed
        ];
    }
}
