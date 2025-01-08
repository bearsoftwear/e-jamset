<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SpatieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'lander']);
        Role::create(['name' => 'borrower']);

        // todo reformat lander = some that register and have asset, borrower no need to register, asset belongs to lander after register, create pivot table borrower rentals history

    }
}
