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
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'Manager']);

        $permissions 
        = ['manage-role', 'view-role', 'create-role', 'edit-role' , 'delete-role'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        Permission::create(['name' => 'manage-user']);
        Permission::create(['name' => 'view-user']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);
        $admin->givePermissionTo(Permission::all());
        $user->givePermissionTo($permissions);
    }
}
