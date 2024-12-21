<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'edit-role']);
        Permission::create(['name' => 'view-list-users']);
        Permission::create(['name' => 'create-car']);
        Permission::create(['name' => 'edit-car']);
        Permission::create(['name' => 'delete-car']); 
        Permission::create(['name' => 'edit-commande']);
        Permission::create(['name' => 'crud-trsm-carb-model-marque-gp']);
        Permission::create(['name' => 'crud-ville-pvc-pays']);

        $adminRole = Role::create(['name' => 'Admin']);
        $employeeRole = Role::create(['name' => 'Employee']);
        $clienteRole = Role::create(['name' => 'Client']);

        $adminRole = Role::where('name', 'Admin')->first();
        $employeeRole = Role::where('name', 'Employee')->first();
        $clienteRole = Role::where('name', 'Client')->first();


        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'edit-role',
            'view-list-users',
            'create-car',
            'edit-car',
            'delete-car',
            'crud-trsm-carb-model-marque-gp',
            'edit-commande',
            'crud-ville-pvc-pays'

        ]);

        $employeeRole->givePermissionTo([
            'create-car',
            'edit-car',
            'delete-car',
            'crud-trsm-carb-model-marque-gp',
            'edit-commande',
            'crud-ville-pvc-pays'

        ]);

        $clienteRole->givePermissionTo([
            'create-users',
            'edit-users'
        ]);
    }
    //php artisan db:seed --class=RoleAndPermissionsSeeder

}

