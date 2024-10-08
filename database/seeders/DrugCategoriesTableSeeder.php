<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DrugCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('drug_categories')->delete();
        
        \DB::table('drug_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'الجهاز التنفسي',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'antiacid',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'antibiotic',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'HAIR',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'analgesic',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'face care',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'sleeping pills',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'deodorant',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'SKIN CARE',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'baby food',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'supplement facts',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'DEVICES MACHINE',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'ANTI HYPERTENSIVE',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'HYIGENE',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'ANTIFUNGAL',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'ASTHMA DEVICE',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'sun block',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'oral cavity',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'antiallergic',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'antiviral',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'lip care',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'foot care',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'antihyperuricemia',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'ANTIDIABETICS',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'REPRODUCTIVE SYSTEM',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'HAIR CARE',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'ANTIHEMORRHOIDS',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'ANTI VARICOSE',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'NAILS',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'CANDY',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'VAGINAL  WASH',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'BABIES',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'HYPOTHYROIDE',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'CONTRACEPTIVE',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'ANTI COUGH',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'eye care',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'BABY CARE',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'تجميل',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'FIRST AID',
            ),
        ));
        
        
    }
}