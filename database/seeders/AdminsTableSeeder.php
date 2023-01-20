<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('admins')->delete();
        
        DB::table('admins')->insert(array (
            0 => 
            array (
                'created_at' => '2019-03-30 02:35:25',
                'email' => 'drikdoank@gmail.com',
                'email_verified_at' => NULL,
                'foto' => 'fotoadmin/bpjLgHILH7MNK0BkX4PqoI7sT7FwasDza4iFxlVI.png',
                'id' => 14,
                'jkel' => 'L',
                'name' => 'Hendrik',
                'password' => '$2y$10$CCaZjRiUh5nmylH19t0A9Od0agA9ozSsYrptKyacX3kcfAgYLzv.i',
                'phone' => '082344949505',
                'remember_token' => NULL,
                'role_id' => 1,
                'updated_at' => '2020-05-07 09:03:15',
            ),
            1 => 
            array (
                'created_at' => '2020-09-17 11:31:11',
                'email' => 'fahri@gmail.com',
                'email_verified_at' => NULL,
                'foto' => 'fotoadmin/WHS4qNKqoHJj9OJeUNuZlzEFqrYoTKdvn8pPfQeT.jpeg',
                'id' => 15,
                'jkel' => 'L',
                'name' => 'Fahri',
                'password' => '$2y$10$RisK3wsJGAzrGxJ7wYVw4e5RljGIWlrvXwe8rcT4isXehZB9KaGvW',
                'phone' => '08873827381',
                'remember_token' => NULL,
                'role_id' => 6,
                'updated_at' => '2020-09-17 11:39:48',
            ),
        ));
        
        
    }
}