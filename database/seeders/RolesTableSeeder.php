<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'عمار',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 11:43:29',
                'updated_at' => '2024-06-10 11:43:29',
            ),
            1 => 
            array (
                'id' => 9,
                'name' => 'اكرم',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 17:42:23',
                'updated_at' => '2024-06-10 17:42:23',
            ),
            2 => 
            array (
                'id' => 10,
                'name' => 'المراجع',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 17:42:28',
                'updated_at' => '2024-06-10 17:42:28',
            ),
            3 => 
            array (
                'id' => 11,
                'name' => 'شيخ الدين',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 17:42:41',
                'updated_at' => '2024-06-10 17:42:41',
            ),
            4 => 
            array (
                'id' => 12,
                'name' => 'المصري',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 17:42:51',
                'updated_at' => '2024-06-10 17:42:51',
            ),
        ));
        
        
    }
}