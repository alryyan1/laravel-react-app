<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Sysmex550TableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sysmex550')->delete();
        
        \DB::table('sysmex550')->insert(array (
            0 => 
            array (
                'patient_id' => 1001,
                'WBC' => '12.8',
                'RBC' => '4.6',
                'HGB' => '13.3',
                'HCT' => '39.0',
                'MCV' => '85.9',
                'MCH' => '29.2',
                'MCHC' => '34.0',
                'PLT' => '370.0',
                'NEUTP' => '73.8',
                'LYMPHP' => '20.9',
                'MONOP' => '4.5',
                'EOP' => '0.8',
                'BASOP' => '0.0',
                'NEUTC' => '8.7',
                'LYMPHC' => '2.5',
                'MONOC' => '0.5',
                'EOC' => '0.1',
                'BASOC' => '0.0',
                'IGP' => '0.0',
                'IGC' => '0.0',
                'RDWSD' => '88.5',
                'RDWCV' => '14.8',
                'MICROR' => '0.0',
                'MACROR' => '0.0',
                'PDW' => '10.4',
                'MPV' => '8.5',
                'PLCR' => '19',
                'PCT' => '0.3',
            ),
        ));
        
        
    }
}