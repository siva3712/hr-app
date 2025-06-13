<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        User::factory()->create([
            'emp_id' => '3712',
            'bic' => '1',
            'region' => 'KDP',
            'name' => 'Siva Kumar',
            'email' => 'test@example.com',
        ]);
        // User::factory(10)->create();
    }
}
