<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // This registers your master pizzeria engine loader to execute automatically
        $this->call(MasterPizzeriaSeeder::class);
    }
}
