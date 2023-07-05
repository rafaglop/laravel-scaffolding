<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role = Role::create(['name' => 'admin']);

        $permission = Permission::create(['name' => 'manage posts']);
        $role->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'manage pages']);
        $role->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'manage users']);
        $role->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'manage leads']);
        $role->givePermissionTo($permission);
    }
}
