<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('units')->delete();
        
        \DB::table('units')->insert(array (
            0 => 
            array (
                'id' => 1,
                'Unit_name' => 'mg/dl',
            ),
            1 => 
            array (
                'id' => 2,
                'Unit_name' => 'g/dl',
            ),
            2 => 
            array (
                'id' => 3,
                'Unit_name' => 'mmol/l',
            ),
            3 => 
            array (
                'id' => 4,
                'Unit_name' => 'IU/l',
            ),
            4 => 
            array (
                'id' => 5,
                'Unit_name' => 'mEq/L',
            ),
            5 => 
            array (
                'id' => 6,
                'Unit_name' => 'mU/ml',
            ),
            6 => 
            array (
                'id' => 7,
                'Unit_name' => 'nmol/l',
            ),
            7 => 
            array (
                'id' => 8,
                'Unit_name' => 'ng/ml',
            ),
            8 => 
            array (
                'id' => 9,
                'Unit_name' => 'second',
            ),
            9 => 
            array (
                'id' => 10,
                'Unit_name' => 'x 10^3 µL',
            ),
            10 => 
            array (
                'id' => 11,
                'Unit_name' => 'million/µl',
            ),
            11 => 
            array (
                'id' => 12,
                'Unit_name' => '%',
            ),
            12 => 
            array (
                'id' => 13,
                'Unit_name' => 'F/l',
            ),
            13 => 
            array (
                'id' => 14,
                'Unit_name' => 'Pg',
            ),
            14 => 
            array (
                'id' => 15,
                'Unit_name' => 'x 10.000 /uL',
            ),
            15 => 
            array (
                'id' => 16,
                'Unit_name' => 'U/L',
            ),
            16 => 
            array (
                'id' => 17,
                'Unit_name' => 'min',
            ),
            17 => 
            array (
                'id' => 18,
                'Unit_name' => 'mm/hour',
            ),
            18 => 
            array (
                'id' => 19,
                'Unit_name' => 'U/L',
            ),
            19 => 
            array (
                'id' => 20,
                'Unit_name' => 'µg/ml',
            ),
            20 => 
            array (
                'id' => 21,
                'Unit_name' => 'cells/µl',
            ),
            21 => 
            array (
                'id' => 22,
                'Unit_name' => 'meq/L',
            ),
            22 => 
            array (
                'id' => 23,
                'Unit_name' => 'titer',
            ),
            23 => 
            array (
                'id' => 24,
                'Unit_name' => 'pg/ml',
            ),
            24 => 
            array (
                'id' => 25,
                'Unit_name' => 'ug/24r',
            ),
            25 => 
            array (
                'id' => 26,
                'Unit_name' => 'ng/l',
            ),
            26 => 
            array (
                'id' => 27,
                'Unit_name' => 'ug/24h',
            ),
            27 => 
            array (
                'id' => 28,
                'Unit_name' => 'IU/mL',
            ),
            28 => 
            array (
                'id' => 29,
                'Unit_name' => 'μg/dL',
            ),
            29 => 
            array (
                'id' => 30,
                'Unit_name' => 'mOsmol/kg H2O',
            ),
            30 => 
            array (
                'id' => 31,
                'Unit_name' => 'mm/hour',
            ),
            31 => 
            array (
                'id' => 32,
                'Unit_name' => 'N',
            ),
            32 => 
            array (
                'id' => 33,
                'Unit_name' => 'col/l',
            ),
            33 => 
            array (
                'id' => 34,
                'Unit_name' => '',
            ),
            34 => 
            array (
                'id' => 35,
                'Unit_name' => 'AU/ml',
            ),
            35 => 
            array (
                'id' => 36,
                'Unit_name' => 'unit/ml',
            ),
            36 => 
            array (
                'id' => 37,
                'Unit_name' => 'mEq/L',
            ),
            37 => 
            array (
                'id' => 38,
                'Unit_name' => '',
            ),
            38 => 
            array (
                'id' => 39,
                'Unit_name' => ' μIU/ml',
            ),
            39 => 
            array (
                'id' => 40,
                'Unit_name' => 'mIU/ml',
            ),
            40 => 
            array (
                'id' => 41,
                'Unit_name' => 'µg/dL',
            ),
            41 => 
            array (
                'id' => 42,
                'Unit_name' => 'µg/L',
            ),
            42 => 
            array (
                'id' => 43,
                'Unit_name' => 'pg/ml',
            ),
            43 => 
            array (
                'id' => 44,
                'Unit_name' => 'ng/dl',
            ),
            44 => 
            array (
                'id' => 45,
                'Unit_name' => 'µg/dl',
            ),
            45 => 
            array (
                'id' => 46,
                'Unit_name' => 'unit/ml',
            ),
            46 => 
            array (
                'id' => 47,
                'Unit_name' => 'ug FEU/ml',
            ),
            47 => 
            array (
                'id' => 48,
                'Unit_name' => 'µmol/L',
            ),
            48 => 
            array (
                'id' => 49,
                'Unit_name' => 'mUI/L',
            ),
            49 => 
            array (
                'id' => 50,
                'Unit_name' => 'mUI/L',
            ),
            50 => 
            array (
                'id' => 51,
                'Unit_name' => 'pmol/l',
            ),
            51 => 
            array (
                'id' => 52,
                'Unit_name' => 'pmol/l',
            ),
            52 => 
            array (
                'id' => 53,
                'Unit_name' => 'ng/ml',
            ),
            53 => 
            array (
                'id' => 54,
                'Unit_name' => 'ng/ml',
            ),
            54 => 
            array (
                'id' => 55,
                'Unit_name' => 'ng/ml',
            ),
            55 => 
            array (
                'id' => 56,
                'Unit_name' => 'ng/ml',
            ),
            56 => 
            array (
                'id' => 57,
                'Unit_name' => 'MIU/ml',
            ),
            57 => 
            array (
                'id' => 58,
                'Unit_name' => 'MIU/ml',
            ),
            58 => 
            array (
                'id' => 59,
                'Unit_name' => 'mg/dl',
            ),
            59 => 
            array (
                'id' => 60,
                'Unit_name' => 'mg/dl',
            ),
            60 => 
            array (
                'id' => 61,
                'Unit_name' => 'mg/L',
            ),
            61 => 
            array (
                'id' => 62,
                'Unit_name' => 'mg/day',
            ),
            62 => 
            array (
                'id' => 63,
                'Unit_name' => 'g/day',
            ),
            63 => 
            array (
                'id' => 64,
                'Unit_name' => 'umol/ml',
            ),
            64 => 
            array (
                'id' => 65,
                'Unit_name' => 'U/ML',
            ),
            65 => 
            array (
                'id' => 66,
                'Unit_name' => 'Ru/Ml',
            ),
            66 => 
            array (
                'id' => 67,
                'Unit_name' => '10^9/L',
            ),
            67 => 
            array (
                'id' => 68,
                'Unit_name' => '10^12/L',
            ),
            68 => 
            array (
                'id' => 69,
                'Unit_name' => 'pg/ml',
            ),
            69 => 
            array (
                'id' => 70,
                'Unit_name' => '0',
            ),
            70 => 
            array (
                'id' => 71,
                'Unit_name' => 'mg/g',
            ),
            71 => 
            array (
                'id' => 72,
                'Unit_name' => 'index/ml',
            ),
            72 => 
            array (
                'id' => 73,
                'Unit_name' => 'Molecular Biology',
            ),
            73 => 
            array (
                'id' => 74,
                'Unit_name' => 'mg/24h',
            ),
            74 => 
            array (
                'id' => 75,
                'Unit_name' => 'ug/day',
            ),
            75 => 
            array (
                'id' => 76,
                'Unit_name' => 'AU/ml',
            ),
            76 => 
            array (
                'id' => 77,
                'Unit_name' => 'IU/ml',
            ),
            77 => 
            array (
                'id' => 78,
                'Unit_name' => 'IU/l',
            ),
            78 => 
            array (
                'id' => 79,
                'Unit_name' => 'g/l',
            ),
            79 => 
            array (
                'id' => 80,
                'Unit_name' => 'U/ml',
            ),
            80 => 
            array (
                'id' => 81,
                'Unit_name' => 'IU/ml',
            ),
            81 => 
            array (
                'id' => 82,
                'Unit_name' => 'IU/ml',
            ),
            82 => 
            array (
                'id' => 83,
                'Unit_name' => 'mg/ml',
            ),
            83 => 
            array (
                'id' => 84,
                'Unit_name' => '%',
            ),
            84 => 
            array (
                'id' => 85,
                'Unit_name' => '%',
            ),
            85 => 
            array (
                'id' => 86,
                'Unit_name' => 'IU/ml',
            ),
            86 => 
            array (
                'id' => 87,
                'Unit_name' => '/L ',
            ),
            87 => 
            array (
                'id' => 88,
                'Unit_name' => 'mg albumin/mmol crea',
            ),
        ));
        
        
    }
}