<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // All roles
        $chef = Role::create(['name'=>'chef']);
        $client = Role::create(['name'=>'client']);

        // Permission client
        Permission::create(['name'=>'create_orders'])->assignRole($client);

        // Permission chef
        Permission::create(['name'=>'view_orders'])->assignRole($chef);
        Permission::create(['name'=>'modify_orders'])->assignRole($chef);
        Permission::create(['name'=>'modify_foods'])->assignRole($chef);

        // Permission client and chef
        Permission::create(['name'=>'view_foods'])->syncRoles([ $chef, $client]);
    }
}
