<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define default permissions
        $permissions = [
            'developer',
            'manage users',
            'manage roles',
            'manage permissions',
            'view reports',
            'verify data',
            'access psychology tools',
        ];

        // Create permissions if not exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles
        $roles = [
            'Developer' => ['developer','manage users', 'manage roles', 'manage permissions', 'view reports', 'verify data', 'access psychology tools'],
            'Admin' => ['manage users', 'manage roles', 'view reports'],
            'Manager' => ['view reports', 'verify data'],
            'Verifier' => ['verify data'],
            'Psychologist' => ['access psychology tools'],
            'User' => [],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
            $role->syncPermissions($rolePermissions); // Assign permissions
        }
    }
}
