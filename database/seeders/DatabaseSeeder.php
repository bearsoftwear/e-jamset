<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Transaction;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
            'name' => 'Lander '.fake()->name(),
            'email' => 'lander@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('lander');

        User::factory(10)->create()->each(function ($user) {
            $user->syncRoles('lander');
        });
        Asset::factory(20)->create();
        /*User::factory(10)->create()->each(function ($user) {
            $user->syncRoles('borrower');
        });*/
        User::factory()->create([
            'name' => 'Borrower '.fake()->name(),
            'email' => 'borrower@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('borrower');

        Transaction::factory(500)->create();

        User::factory()->create([
            'name' => 'Admin '.fake()->name(),
            'email' => 'bearsoftwear@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('admin');
    }
}
