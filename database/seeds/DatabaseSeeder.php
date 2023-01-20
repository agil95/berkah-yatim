<?php

use Illuminate\Database\Seeder;
use Database\Seeds\AdminsTableSeeder;
use Database\Seeds\MenuTableSeeder;
use Database\Seeds\UserRoleTableSeeder;
use Database\Seeds\KategoriesTableSeeder;
use Database\Seeds\ProkersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(AdminsTableSeeder::class);
        // $this->call(MenuTableSeeder::class);
        //$this->call(UserRoleTableSeeder::class);
        $this->call(KategoriesTableSeeder::class);
        $this->call(ProkersTableSeeder::class);

    }
}
