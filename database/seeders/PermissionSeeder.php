<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermission = Permission::create(['name' => 'manage-users']);

        $adminCreate = Permission::create(['name' => 'admin-create']);
        $adminEdit = Permission::create(['name' => 'admin-edit']);
        $adminView = Permission::create(['name' => 'admin-view']);
        $adminDelete = Permission::create(['name' => 'admin-delete']);
        $adminIndex = Permission::create(['name' => 'admin-index']);

        $adminPermission->givePermissionTo(
            [
                $adminCreate, $adminEdit, $adminView, $adminDelete, $adminIndex
            ]
        );

        $superVisorPermission = Permission::create(['name' => 'manage-cashiers']);

        $superVisorCreate = Permission::create(['name' => 'super-visor-create']);
        $superVisorEdit = Permission::create(['name' => 'super-visor-edit']);
        $superVisorView = Permission::create(['name' => 'super-visor-view']);
        $superVisorDelete = Permission::create(['name' => 'super-visor-delete']);
        $superVisorIndex = Permission::create(['name' => 'super-visor-index']);

        $superVisorPermission->givePermissionTo(
            [
                $superVisorCreate, $superVisorEdit, $superVisorView, $superVisorDelete, $superVisorIndex
            ]
        );

        $cashierPermission = Permission::create(['name' => 'manage-sales']);

        $cashierCreate = Permission::create(['name' => 'cashier-create']);
        $cashierEdit = Permission::create(['name' => 'cashier-edit']);
        $cashierView = Permission::create(['name' => 'cashier-view']);
        $cashierDelete = Permission::create(['name' => 'cashier-delete']);
        $cashierIndex = Permission::create(['name' => 'cashier-index']);

        $cashierPermission->givePermissionTo(
            [
                $cashierCreate, $cashierEdit, $cashierView, $cashierDelete, $cashierIndex
            ]
        );

    }
}
