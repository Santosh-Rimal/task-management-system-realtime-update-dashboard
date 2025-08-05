<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $permissions = [
       // Role Permissions
       'roles.create',
       'roles.delete',
       'roles.edit',
       'roles.view',
       'roles.single.view',

       // Permission Permissions
       'permissions.create',
       'permissions.delete',
       'permissions.edit',
       'permissions.view',
       'permissions.single.view',

       // Task Permissions
       'tasks.create',
       'tasks.delete',
       'tasks.edit',
       'tasks.view',
       'tasks.single.view',

       // User Permissions
       'users.create',
       'users.delete',
       'users.edit',
       'users.view',
       'users.single.view',
       ];

       foreach ($permissions as $permission) {
       Permission::firstOrCreate(['name' => $permission]);
       }
    }
}