<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Borrower;
use App\Models\Lander;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create();
        Lander::factory(9)->create();
        Asset::factory(50)->create();
        Borrower::factory(100)->create();
    }
}
