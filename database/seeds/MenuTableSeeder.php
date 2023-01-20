<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('menu')->delete();
        
        DB::table('menu')->insert(array (
            0 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-pie-chart',
                'id' => 1,
                'name' => 'Overview Data',
                'parent_id' => NULL,
                'updated_at' => '2020-09-23 10:28:03',
                'url' => 'admin',
            ),
            1 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-dollar',
                'id' => 2,
                'name' => 'Manage Donasi',
                'parent_id' => NULL,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => NULL,
            ),
            2 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-circle-o',
                'id' => 3,
                'name' => 'Donasi Donatur',
                'parent_id' => 2,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/manage-donasi-user',
            ),
            3 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-circle-o',
                'id' => 4,
                'name' => 'Donasi NGO',
                'parent_id' => 2,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/manage-donasi-ngo',
            ),
            4 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-credit-card',
                'id' => 5,
                'name' => 'Manage Payment',
                'parent_id' => NULL,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => NULL,
            ),
            5 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-circle-o',
                'id' => 6,
                'name' => 'Verifikasi Pembayaran Manual',
                'parent_id' => 5,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/manage-donasi-manual',
            ),
            6 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-circle-o',
                'id' => 7,
                'name' => 'Manage Status Pembayaran',
                'parent_id' => 5,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/manage-donasi-status',
            ),
            7 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-circle-o',
                'id' => 8,
                'name' => 'Manage Metode Pembayaran',
                'parent_id' => 5,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/manage-rekening',
            ),
            8 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-th-large',
                'id' => 9,
                'name' => 'Manage Kategori',
                'parent_id' => NULL,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/manage-kategori',
            ),
            9 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-image',
                'id' => 10,
                'name' => 'Manage Banner',
                'parent_id' => NULL,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/manage-banner',
            ),
            10 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-flag',
                'id' => 11,
                'name' => 'Manage Campaign',
                'parent_id' => NULL,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/manage-campaign',
            ),
            11 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-users',
                'id' => 12,
                'name' => 'Manage Mitra',
                'parent_id' => NULL,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/manage-mitra',
            ),
            12 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-user',
                'id' => 13,
                'name' => 'Manage Donatur',
                'parent_id' => NULL,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => NULL,
            ),
            13 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-circle-o',
                'id' => 14,
                'name' => 'Data Donatur',
                'parent_id' => 13,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/manageuser',
            ),
            14 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-users',
                'id' => 15,
                'name' => 'Admin Roles',
                'parent_id' => NULL,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => NULL,
            ),
            15 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-circle-o',
                'id' => 16,
                'name' => 'Admin',
                'parent_id' => 15,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/manageadmin',
            ),
            16 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-circle-o',
                'id' => 17,
                'name' => 'User Role',
                'parent_id' => 15,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/user_role',
            ),
            17 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-circle-o',
                'id' => 18,
                'name' => 'Menu',
                'parent_id' => 15,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/menu',
            ),
            18 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-google-wallet',
                'id' => 19,
                'name' => 'Penyaluran',
                'parent_id' => NULL,
                'updated_at' => '2020-09-17 14:37:40',
                'url' => 'admin/penyaluran',
            ),
            19 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-clipboard',
                'id' => 20,
                'name' => 'Laporan',
                'parent_id' => NULL,
                'updated_at' => '2020-09-17 16:33:54',
                'url' => 'admin/laporan',
            ),
            20 => 
            array (
                'created_at' => '2020-09-17 14:37:40',
                'icon' => 'fa fa-clipboard',
                'id' => 22,
                'name' => 'Logs',
                'parent_id' => NULL,
                'updated_at' => '2020-09-17 16:33:54',
                'url' => 'admin/logs',
            ),
            21 => 
            array (
                'created_at' => '2020-11-03 13:57:19',
                'icon' => 'fa fa-circle-o',
                'id' => 23,
                'name' => 'Dashboard',
                'parent_id' => NULL,
                'updated_at' => '2020-11-03 13:57:19',
                'url' => NULL,
            ),
        ));
        
        
    }
}