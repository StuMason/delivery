<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'edit restaurant']);
        Permission::create(['name' => 'delete restuarant']);
        Permission::create(['name' => 'create restaurant']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'unverified']);

        $role = Role::create(['name' => 'restaurateur']);
        $role->givePermissionTo(['edit restaurant']);

        $role = Role::create(['name' => 'driver']);

        $role = Role::create(['name' => 'customer']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
