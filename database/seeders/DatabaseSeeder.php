<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AircraftType; // Import the AircraftType model
use App\Models\Operator; // Import the Operator model
use App\Models\Aircraft; // Import the Aircraft model

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ronald Windwaai',
            'email' => 'ronaldwindwaai@gmail.com',
            'password'=>Hash::make('MfundoMtselu'),
            'is_admin' => true, // Default to non-admin
        ]);

        // Create 5 aircraft types
        AircraftType::factory()->count(5)->create();

        // Create 10 operators
        Operator::factory()->count(10)->create();

        // Create 50 aircraft records with existing operators and aircraft types
        Aircraft::factory()->count(50)->create();
    }
}
