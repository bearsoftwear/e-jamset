<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Borrower;
use App\Models\Lander;
use App\Models\Transaction;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            SpatieSeeder::class,
        );

        User::factory()->create([
            'name' => 'Lander ' . fake()->name(),
            'email' => 'lander@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('lander');

        Lander::factory(9)->create();

        Asset::factory(50)->create();
        Borrower::factory(10)->create();
        Transaction::factory(100)->create();

        User::factory()->create([
            'name' => 'Admin ' . fake()->name(),
            'email' => 'bearsoftwear@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('admin');
    }
}
