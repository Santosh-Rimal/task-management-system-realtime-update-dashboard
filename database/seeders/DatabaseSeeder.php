<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\StatusSeeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ensure the role exists
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);

        // Create a user
        $user = User::factory()->create([
            'name' => 'Santosh Rimal',
            'email' => '2054santoshrimal@gmail.com',
        ]);

        // Assign the role
        $user->assignRole($superAdminRole);
        
        $this->call([
        PermissionSeeder::class,
        StatusSeeder::class,
        ]);
    }
}