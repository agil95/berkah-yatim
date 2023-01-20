<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('user_role')->delete();
        
        DB::table('user_role')->insert(array (
            0 => 
            array (
                'created_at' => '2020-12-19 00:00:00',
                'id' => 1,
                'menu_ids' => NULL,
                'name' => 'Super Admin',
                'updated_at' => '2020-12-19 00:00:00',
            ),
        ));
        
        
    }
}