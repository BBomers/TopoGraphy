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
        // Note for mentor: This is not ai generated code, I got it from the documentation: https://spatie.be/docs/laravel-permission/v6/advanced-usage/seeding

        // create permissions
        Permission::create(['name' => 'see all existing users']);
        Permission::create(['name' => 'delete any user']);
        Permission::create(['name' => 'create class groups']);
        Permission::create(['name' => 'delete your class groups']);
        Permission::create(['name' => 'join class groups']);
        Permission::create(['name' => 'leave class groups']);
        Permission::create(['name' => 'see all users in your class group']);
        Permission::create(['name' => 'see you own profile']);

        // update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([
            'see all existing users',
            'delete any user'
        ]);

        $teacher = Role::create(['name' => 'teacher']);
        $teacher->givePermissionTo([
            'create class groups',
            'delete your class groups',
            'see all users in your class group'
        ]);

        $student = Role::create(['name' => 'student']);
        $student->givePermissionTo([
            'join class groups',
            'leave class groups',
            'see you own profile'
        ]);

        
    }
}
