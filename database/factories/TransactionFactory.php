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
        do {
            $start_date = fake()->dateTimeThisMonth()->format('Y-m-d');
            $finish_date = date('Y-m-d', strtotime($start_date . ' +1 day'));
        } while (Transaction::where(function ($query) use ($start_date, $finish_date) {
            $query->whereBetween('start_date', [$start_date, $finish_date])
              ->orWhereBetween('finish_date', [$start_date, $finish_date]);
        })->exists());

        return [
            'event' => fake()->jobTitle(),
            'booking_code' => fake()->numerify('####' . now()->year . '####'),
            'asset_id' => Asset::inRandomOrder()->first(),
            'approval' => 'accept', // fake()->randomElement(['wait', 'accept', 'deny']),
            'start_date' => $start_date, // fake()->dateTimeThisYear()->format('Y-m-d'), // now()->format('Y-m-d'),
            'finish_date' => $finish_date, // fake()->dateTimeBetween('now', '+'.fake()->numberBetween(1,7).' days')->format('Y-m-d'),
            'borrower_id' => fake()->boolean() ? Borrower::inRandomOrder(1)->first() : Borrower::factory()->create(),
        ];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (Transaction $transaction) {
    //         if ($transaction->approval === 'accept') {
    //             $transaction->update(['finish_date' => fake()->dateTimeBetween('now', '+'.fake()->numberBetween(1,7).' days')->format('Y-m-d')]);
    //         } else {
    //             $transaction->update(['finish_date' => null]);
    //         }
    //     });
    // }
}
