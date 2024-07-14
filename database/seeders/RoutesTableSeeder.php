<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('routes')->delete();
        
        \DB::table('routes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'inventory',
                'path' => 'inventory',
                'created_at' => '2024-07-14 14:22:58',
                'updated_at' => '2024-07-14 14:22:58',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'pharmacy',
                'path' => 'pharma',
                'created_at' => '2024-07-14 14:22:58',
                'updated_at' => '2024-07-14 14:22:58',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'audit',
                'path' => 'audit',
                'created_at' => '2024-07-14 14:22:58',
                'updated_at' => '2024-07-14 14:22:58',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'lab',
                'path' => 'lab',
                'created_at' => '2024-07-14 14:22:58',
                'updated_at' => '2024-07-14 14:22:58',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'clinic',
                'path' => 'clinic',
                'created_at' => '2024-07-14 14:22:58',
                'updated_at' => '2024-07-14 14:22:58',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'insurance',
                'path' => 'insurance',
                'created_at' => '2024-07-14 14:22:58',
                'updated_at' => '2024-07-14 14:22:58',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'services',
                'path' => 'services',
                'created_at' => '2024-07-14 14:22:58',
                'updated_at' => '2024-07-14 14:22:58',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'settings',
                'path' => 'settings',
                'created_at' => '2024-07-14 14:22:58',
                'updated_at' => '2024-07-14 14:22:58',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'dashboard',
                'path' => 'dashboard',
                'created_at' => '2024-07-14 14:22:58',
                'updated_at' => '2024-07-14 14:22:58',
            ),
        ));
        
        
    }
}