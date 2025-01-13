<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\Borrower;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event' => fake()->jobTitle(),
            'booking_code' => fake()->numerify('####' . now()->year . '####'),
            'asset_id' => Asset::inRandomOrder()->first(),
            'approval' => fake()->randomElement(['wait', 'accept', 'deny']),
            'start_date' => now(),
            'borrower_id' => fake()->boolean() ? Borrower::inRandomOrder(1)->first() : Borrower::factory()->create(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Transaction $transaction) {
            if ($transaction->approval === 'accept') {
                $transaction->update(['finish_date' => fake()->dateTimeBetween('now', '+'.fake()->numberBetween(1,7).' days')]);
            } else {
                $transaction->update(['finish_date' => null]);
            }
        });
    }
}
