<?php

namespace Database\Factories;

use App\Models\Lander;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lander_id' => Lander::inRandomOrder()->first(),
            'name' => fake()->company(),
            'location' => fake()->country(),
            'rental_price' => fake()->randomNumber(7, true),
            'image' => 'https://picsum.photos/seed/'.fake()->randomNumber(2, true).'/256',
        ];
    }
}
