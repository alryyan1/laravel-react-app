<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContainersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('containers')->delete();
        
        \DB::table('containers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'container_name' => 'EDTA',
            ),
            1 => 
            array (
                'id' => 2,
                'container_name' => 'heparin',
            ),
            2 => 
            array (
                'id' => 3,
                'container_name' => 'flouride',
            ),
            3 => 
            array (
                'id' => 4,
                'container_name' => 'citrate',
            ),
            4 => 
            array (
                'id' => 5,
                'container_name' => 'Stool',
            ),
            5 => 
            array (
                'id' => 6,
                'container_name' => 'Urine',
            ),
            6 => 
            array (
                'id' => 7,
                'container_name' => 'esr',
            ),
            7 => 
            array (
                'id' => 8,
                'container_name' => 'plain',
            ),
            8 => 
            array (
                'id' => 9,
                'container_name' => 'ict',
            ),
            9 => 
            array (
                'id' => 10,
                'container_name' => 'urea breath test',
            ),
            10 => 
            array (
                'id' => 11,
                'container_name' => 'timer',
            ),
        ));
        
        
    }
}