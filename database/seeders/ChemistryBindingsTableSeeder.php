<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChemistryBindingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('chemistry_bindings')->delete();
        
        \DB::table('chemistry_bindings')->insert(array (
            0 => 
            array (
                'id' => 3,
                'child_id_array' => '18',
                'name_in_mindray_table' => 'pho',
            ),
            1 => 
            array (
                'id' => 5,
                'child_id_array' => '17',
                'name_in_mindray_table' => 'ca',
            ),
            2 => 
            array (
                'id' => 7,
                'child_id_array' => '21',
                'name_in_mindray_table' => 'tb',
            ),
            3 => 
            array (
                'id' => 8,
                'child_id_array' => '22',
                'name_in_mindray_table' => 'db',
            ),
            4 => 
            array (
                'id' => 9,
                'child_id_array' => '25',
                'name_in_mindray_table' => 'alt',
            ),
            5 => 
            array (
                'id' => 10,
                'child_id_array' => '24',
                'name_in_mindray_table' => 'ast',
            ),
            6 => 
            array (
                'id' => 12,
                'child_id_array' => '23',
                'name_in_mindray_table' => 'alp',
            ),
            7 => 
            array (
                'id' => 13,
                'child_id_array' => '19',
                'name_in_mindray_table' => 'tp',
            ),
            8 => 
            array (
                'id' => 14,
                'child_id_array' => '20',
                'name_in_mindray_table' => 'alb',
            ),
            9 => 
            array (
                'id' => 15,
                'child_id_array' => '27',
                'name_in_mindray_table' => 'tg',
            ),
            10 => 
            array (
                'id' => 16,
                'child_id_array' => '29',
                'name_in_mindray_table' => 'ldl',
            ),
            11 => 
            array (
                'id' => 17,
                'child_id_array' => '28',
                'name_in_mindray_table' => 'hdl',
            ),
            12 => 
            array (
                'id' => 18,
                'child_id_array' => '26',
                'name_in_mindray_table' => 'tc',
            ),
            13 => 
            array (
                'id' => 19,
                'child_id_array' => '16',
                'name_in_mindray_table' => 'crea',
            ),
            14 => 
            array (
                'id' => 20,
                'child_id_array' => '15',
                'name_in_mindray_table' => 'uric',
            ),
            15 => 
            array (
                'id' => 21,
                'child_id_array' => '119',
                'name_in_mindray_table' => 'urea',
            ),
            16 => 
            array (
                'id' => 36,
                'child_id_array' => '30',
                'name_in_mindray_table' => 'na',
            ),
            17 => 
            array (
                'id' => 37,
                'child_id_array' => '31',
                'name_in_mindray_table' => 'k',
            ),
            18 => 
            array (
                'id' => 44,
                'child_id_array' => '1,83',
                'name_in_mindray_table' => 'glug',
            ),
        ));
        
        
    }
}