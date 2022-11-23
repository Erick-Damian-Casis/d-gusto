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
        $role1 = Role::create(['name'=>'Chef']);
        $role2 = Role::create(['name'=>'Client']);

        Permission::create(['name'=>'foods.index'])->syncRoles([ $role1, $role2]);
        Permission::create(['name'=>'foods.show'])->syncRoles([ $role1, $role2]);
        Permission::create(['name'=>'foods.create'])->assignRole($role1);
        Permission::create(['name'=>'foods.update'])->assignRole($role1);
        Permission::create(['name'=>'foods.destroy'])->assignRole($role1);

        Permission::create(['name'=>'orders.index'])->assignRole($role1);
        Permission::create(['name'=>'orders.show'])->assignRole($role1);
        Permission::create(['name'=>'orders.create'])->assignRole($role2);
        Permission::create(['name'=>'orders.update'])->assignRole($role1);
        Permission::create(['name'=>'orders.delete'])->assignRole($role1);
    }
}
