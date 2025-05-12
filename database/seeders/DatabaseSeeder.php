<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the roles seeder first
        $this->call(RolesTableSeeder::class);

        // Create a test user with the 'client' role
        $clientRole = Role::where('name', 'client')->first();

        User::factory()->create([
            'name' => 'Test Client',
            'email' => 'test@example.com',
            'role_id' => $clientRole->id,
        ]);
    }
}
