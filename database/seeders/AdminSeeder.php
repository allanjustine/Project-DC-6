<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'password' => bcrypt('password123')
        ])->assignRole('Admin', 'Super Visor', 'Cashier')
            ->givePermissionTo('manage-users', 'manage-cashiers', 'manage-sales');

        User::factory()->create([
            'name' => 'Super Visor',
            'email' => 'supervisor@app.com',
            'password' => bcrypt('password123')
        ])->assignRole('Super Visor', 'Cashier')
            ->givePermissionTo('manage-sales', 'manage-cashiers');

        User::factory()->create([
            'name' => 'Cashier',
            'email' => 'cashier@app.com',
            'password' => bcrypt('password123')
        ])->assignRole('Cashier')
            ->givePermissionTo('manage-sales');
    }
}
