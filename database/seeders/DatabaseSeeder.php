<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\FuelHistory;
use App\Models\Generator;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = UserFactory::new()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $generator = Generator::factory()->create([
            'user_id' => $user->id,
        ]);

        $generator->fuelHistories()->saveMany(
            FuelHistory::factory()->count(100)->make()
        );
    }
}
