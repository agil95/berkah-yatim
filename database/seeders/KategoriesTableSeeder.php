<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('kategories')->delete();
        
        DB::table('kategories')->insert(array (
            0 => 
            array (
                'created_at' => '2020-06-18 20:38:22',
                'created_by' => 14,
                'dokumentasi' => 'fotokategori/3VfwfUtMTIaDbVGUw1k4ooFATHjmWgcuqol9jQ5v.svg',
                'id' => 14,
                'link' => 'donasi',
                'nama' => 'Donasi',
                'nama_button' => 'Donasi Sekarang',
                'status' => 'active',
                'updated_at' => '2020-09-10 08:59:47',
                'updated_by' => 'Hendrik',
            ),
            1 => 
            array (
                'created_at' => '2020-06-18 20:38:46',
                'created_by' => 14,
                'dokumentasi' => 'fotokategori/EA3AU9kvAZi1rt1gLmZtRMWyjnSdzs1MxtvTpZOz.svg',
                'id' => 15,
                'link' => 'wakaf-masjid',
                'nama' => 'Bencana',
                'nama_button' => 'Donasi Sekarang',
                'status' => 'active',
                'updated_at' => '2020-09-10 09:00:26',
                'updated_by' => 'Hendrik',
            ),
            2 => 
            array (
                'created_at' => '2020-06-18 20:39:04',
                'created_by' => 14,
                'dokumentasi' => 'fotokategori/KOhO3Ir5jjs9oHfFQgbMoGgBWQWrvNnPbAgd09Yr.svg',
                'id' => 16,
                'link' => 'zakat-fitrah',
                'nama' => 'Zakat',
                'nama_button' => 'Zakat Sekarang',
                'status' => 'active',
                'updated_at' => '2020-09-10 09:01:50',
                'updated_by' => 'Hendrik',
            ),
            3 => 
            array (
                'created_at' => '2020-06-18 20:39:31',
                'created_by' => 14,
                'dokumentasi' => 'fotokategori/Q3dS0d6LDbzIz34MBX7hBvBN9rE4I9HQ2pqVcFPp.svg',
                'id' => 17,
                'link' => 'berbagi-beasiswa',
                'nama' => 'Medis',
                'nama_button' => 'Bantu Sekarang',
                'status' => 'active',
                'updated_at' => '2020-11-03 17:24:09',
                'updated_by' => 'Hendrik',
            ),
        ));
        
        
    }
}