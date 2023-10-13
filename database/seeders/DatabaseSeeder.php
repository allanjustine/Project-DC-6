<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Sale;
use App\Models\SoldItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ClientSeeder::class);

        Sale::factory(100)->create();
        SoldItem::factory(300)->create();
    }
}
