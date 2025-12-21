<?php

namespace Database\Seeders;

use App\Models\Shipment;
use App\Models\TravelHistory;
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
        // Create 10 users
        User::factory(1)->create();

        // Create 10 shipments with related travel histories
        // Shipment::factory(10)
        //     ->has(TravelHistory::factory()->count(5))
        //     ->create();
    }
}
