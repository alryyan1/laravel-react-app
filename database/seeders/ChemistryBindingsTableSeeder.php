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
                'id' => 1,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'id',
            ),
            1 => 
            array (
                'id' => 2,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'pid',
            ),
            2 => 
            array (
                'id' => 3,
                'child_id_array' => '18',
                'name_in_mindray_table' => 'pho',
            ),
            3 => 
            array (
                'id' => 4,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'mg',
            ),
            4 => 
            array (
                'id' => 5,
                'child_id_array' => '17',
                'name_in_mindray_table' => 'ca',
            ),
            5 => 
            array (
                'id' => 6,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'gluh',
            ),
            6 => 
            array (
                'id' => 7,
                'child_id_array' => '21',
                'name_in_mindray_table' => 'tb',
            ),
            7 => 
            array (
                'id' => 8,
                'child_id_array' => '22',
                'name_in_mindray_table' => 'db',
            ),
            8 => 
            array (
                'id' => 9,
                'child_id_array' => '25',
                'name_in_mindray_table' => 'alt',
            ),
            9 => 
            array (
                'id' => 10,
                'child_id_array' => '24',
                'name_in_mindray_table' => 'ast',
            ),
            10 => 
            array (
                'id' => 11,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'crp',
            ),
            11 => 
            array (
                'id' => 12,
                'child_id_array' => '23',
                'name_in_mindray_table' => 'alp',
            ),
            12 => 
            array (
                'id' => 13,
                'child_id_array' => '19',
                'name_in_mindray_table' => 'tp',
            ),
            13 => 
            array (
                'id' => 14,
                'child_id_array' => '20',
                'name_in_mindray_table' => 'alb',
            ),
            14 => 
            array (
                'id' => 15,
                'child_id_array' => '27',
                'name_in_mindray_table' => 'tg',
            ),
            15 => 
            array (
                'id' => 16,
                'child_id_array' => '29',
                'name_in_mindray_table' => 'ldl',
            ),
            16 => 
            array (
                'id' => 17,
                'child_id_array' => '28',
                'name_in_mindray_table' => 'hdl',
            ),
            17 => 
            array (
                'id' => 18,
                'child_id_array' => '26',
                'name_in_mindray_table' => 'tc',
            ),
            18 => 
            array (
                'id' => 19,
                'child_id_array' => '16',
                'name_in_mindray_table' => 'crea',
            ),
            19 => 
            array (
                'id' => 20,
                'child_id_array' => '15',
                'name_in_mindray_table' => 'uric',
            ),
            20 => 
            array (
                'id' => 21,
                'child_id_array' => '119',
                'name_in_mindray_table' => 'urea',
            ),
            21 => 
            array (
                'id' => 22,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'ckmb',
            ),
            22 => 
            array (
                'id' => 23,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'ck',
            ),
            23 => 
            array (
                'id' => 24,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'ldh',
            ),
            24 => 
            array (
                'id' => 25,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'fe',
            ),
            25 => 
            array (
                'id' => 26,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'fer',
            ),
            26 => 
            array (
                'id' => 27,
                'child_id_array' => '1,83',
                'name_in_mindray_table' => 'glug',
            ),
            27 => 
            array (
                'id' => 28,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'ddimer',
            ),
            28 => 
            array (
                'id' => 29,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'amylase',
            ),
            29 => 
            array (
                'id' => 30,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'lipase',
            ),
            30 => 
            array (
                'id' => 31,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'aso',
            ),
            31 => 
            array (
                'id' => 32,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'tibc',
            ),
            32 => 
            array (
                'id' => 33,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'acr',
            ),
            33 => 
            array (
                'id' => 34,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'pcr',
            ),
            34 => 
            array (
                'id' => 35,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'hb',
            ),
            35 => 
            array (
                'id' => 36,
                'child_id_array' => '30',
                'name_in_mindray_table' => 'na',
            ),
            36 => 
            array (
                'id' => 37,
                'child_id_array' => '31',
                'name_in_mindray_table' => 'k',
            ),
            37 => 
            array (
                'id' => 38,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'c1',
            ),
            38 => 
            array (
                'id' => 39,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'c2',
            ),
            39 => 
            array (
                'id' => 40,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'ggt',
            ),
            40 => 
            array (
                'id' => 41,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'a1c',
            ),
            41 => 
            array (
                'id' => 42,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'iron',
            ),
            42 => 
            array (
                'id' => 43,
                'child_id_array' => '1',
                'name_in_mindray_table' => 'tpc3',
            ),
        ));
        
        
    }
}