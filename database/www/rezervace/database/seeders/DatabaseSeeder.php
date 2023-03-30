<?php

namespace Database\Seeders;

use Database\Seeders\RoleSeeder;
use Database\Seeders\RoleUserSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(ItemSeeder::class);
    }
}
