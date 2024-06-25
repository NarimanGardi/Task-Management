<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Role::where('name', 'Admin')->exists()) {
            $admin = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        } else {
            $admin = Role::where('name', 'Admin')->first();
        }

        $permissions = config('custom.app_permissions');

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        $admin->givePermissionTo($permissions);
    }
}
