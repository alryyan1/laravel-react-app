<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_groups')->delete();
        
        \DB::table('service_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'كشف',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'العنبر',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'الموجات',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'الاشعه',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'المقطعيه',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'الاسنان',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'العيون',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'العمليه',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'الاخصائيين',
            ),
        ));
        
        
    }
}