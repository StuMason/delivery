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
        Permission::create(['name' => 'edit order']);
        Permission::create(['name' => 'delete order']);
        Permission::create(['name' => 'create order']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'unverified']);

        $role = Role::create(['name' => 'restaurateur']);
        $role->givePermissionTo(['edit order']);

        $role = Role::create(['name' => 'driver']);
        $role->givePermissionTo(['edit order']);

        $role = Role::create(['name' => 'customer']);
        $role->givePermissionTo(['create order']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
