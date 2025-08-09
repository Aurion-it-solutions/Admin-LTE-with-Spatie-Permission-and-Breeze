<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);

        // Create a developer user with all permissions
        $developer = User::factory()->create([
            'name' => 'Developer',
            'email' => 'dev@test.com',
            'password' => bcrypt('password'),
        ]);
        $developer->assignRole('Developer');

        // Create admin user
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('Admin');
    }
}
