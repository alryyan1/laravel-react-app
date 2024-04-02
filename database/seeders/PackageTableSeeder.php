<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('package')->delete();
        
        \DB::table('package')->insert(array (
            0 => 
            array (
                'package_id' => 1,
                'package_name' => 'Haematology',
                'container' => 'EDTA',
                'exp_time' => 1,
            ),
            1 => 
            array (
                'package_id' => 2,
                'package_name' => 'chemistry',
                'container' => 'heparin',
                'exp_time' => 2,
            ),
            2 => 
            array (
                'package_id' => 3,
                'package_name' => 'Hormone',
                'container' => 'plain',
                'exp_time' => 3,
            ),
            3 => 
            array (
                'package_id' => 4,
                'package_name' => 'Serology',
                'container' => 'plain',
                'exp_time' => 1,
            ),
            4 => 
            array (
                'package_id' => 5,
                'package_name' => 'Stool-examination',
                'container' => 'Stool',
                'exp_time' => 1,
            ),
            5 => 
            array (
                'package_id' => 6,
                'package_name' => 'Urine',
                'container' => 'Urine',
                'exp_time' => 1,
            ),
            6 => 
            array (
                'package_id' => 7,
                'package_name' => 'MicroBiology',
                'container' => 'According to sample',
                'exp_time' => 73,
            ),
            7 => 
            array (
                'package_id' => 8,
                'package_name' => 'Coagulation',
                'container' => 'citrate',
                'exp_time' => 2,
            ),
            8 => 
            array (
                'package_id' => 9,
                'package_name' => 'Immunology',
                'container' => 'plain',
                'exp_time' => 1,
            ),
            9 => 
            array (
                'package_id' => 10,
                'package_name' => 'ESR',
                'container' => 'esr',
                'exp_time' => 1,
            ),
            10 => 
            array (
                'package_id' => 11,
                'package_name' => 'Histopathology',
                'container' => 'any',
                'exp_time' => 1,
            ),
            11 => 
            array (
                'package_id' => 12,
                'package_name' => 'Infectious',
                'container' => '',
                'exp_time' => 0,
            ),
            12 => 
            array (
                'package_id' => 13,
                'package_name' => 'Tumor markers',
                'container' => '',
                'exp_time' => 0,
            ),
            13 => 
            array (
                'package_id' => 14,
                'package_name' => 'Theraputic drug',
                'container' => 'edta',
                'exp_time' => 1,
            ),
        ));
        
        
    }
}