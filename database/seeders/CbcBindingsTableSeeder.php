<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CbcBindingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cbc_bindings')->delete();
        
        \DB::table('cbc_bindings')->insert(array (
            0 => 
            array (
                'id' => 2,
                'child_id_array' => '44,72,11,120',
                'name_in_sysmex_table' => 'wbc',
            ),
            1 => 
            array (
                'id' => 3,
                'child_id_array' => '45',
                'name_in_sysmex_table' => 'rbc',
            ),
            2 => 
            array (
                'id' => 4,
                'child_id_array' => '46,70',
                'name_in_sysmex_table' => 'hgb',
            ),
            3 => 
            array (
                'id' => 5,
                'child_id_array' => '47,71',
                'name_in_sysmex_table' => 'hct',
            ),
            4 => 
            array (
                'id' => 6,
                'child_id_array' => '48',
                'name_in_sysmex_table' => 'mcv',
            ),
            5 => 
            array (
                'id' => 7,
                'child_id_array' => '52',
                'name_in_sysmex_table' => 'mch',
            ),
            6 => 
            array (
                'id' => 8,
                'child_id_array' => '53',
                'name_in_sysmex_table' => 'mchc',
            ),
            7 => 
            array (
                'id' => 9,
                'child_id_array' => '54',
                'name_in_sysmex_table' => 'plt',
            ),
            8 => 
            array (
                'id' => 10,
                'child_id_array' => '55,122',
                'name_in_sysmex_table' => 'lym_p',
            ),
            9 => 
            array (
                'id' => 11,
                'child_id_array' => '56,121',
                'name_in_sysmex_table' => 'neut_p',
            ),
            10 => 
            array (
                'id' => 12,
                'child_id_array' => '57',
                'name_in_sysmex_table' => 'mxd_p',
            ),
            11 => 
            array (
                'id' => 13,
                'child_id_array' => '193',
                'name_in_sysmex_table' => 'lym_c',
            ),
            12 => 
            array (
                'id' => 14,
                'child_id_array' => '194',
                'name_in_sysmex_table' => 'mxd_c',
            ),
            13 => 
            array (
                'id' => 15,
                'child_id_array' => '195',
                'name_in_sysmex_table' => 'rdw_sd',
            ),
            14 => 
            array (
                'id' => 16,
                'child_id_array' => '196',
                'name_in_sysmex_table' => 'rdw_cv',
            ),
            15 => 
            array (
                'id' => 17,
                'child_id_array' => '197',
                'name_in_sysmex_table' => 'pdw',
            ),
            16 => 
            array (
                'id' => 18,
                'child_id_array' => '198',
                'name_in_sysmex_table' => 'plcr',
            ),
            17 => 
            array (
                'id' => 19,
                'child_id_array' => '200',
                'name_in_sysmex_table' => 'neut_c',
            ),
            18 => 
            array (
                'id' => 20,
                'child_id_array' => '201',
                'name_in_sysmex_table' => 'mpv',
            ),
        ));
        
        
    }
}