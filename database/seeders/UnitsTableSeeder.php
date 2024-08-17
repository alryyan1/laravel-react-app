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
                'name' => 'mg/dl',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'g/dl',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'mmol/l',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'IU/l',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'mEq/L',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'mU/ml',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'nmol/l',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'ng/ml',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'second',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'x 10^3 µL',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'million/µl',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => '%',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'F/l',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'Pg',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'x 10.000 /uL',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'U/L',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'min',
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'mm/hour',
            ),
            18 =>
            array (
                'id' => 19,
                'name' => 'U/L',
            ),
            19 =>
            array (
                'id' => 20,
                'name' => 'µg/ml',
            ),
            20 =>
            array (
                'id' => 21,
                'name' => 'cells/µl',
            ),
            21 =>
            array (
                'id' => 22,
                'name' => 'meq/L',
            ),
            22 =>
            array (
                'id' => 23,
                'name' => 'titer',
            ),
            23 =>
            array (
                'id' => 24,
                'name' => 'pg/ml',
            ),
            24 =>
            array (
                'id' => 25,
                'name' => 'ug/24r',
            ),
            25 =>
            array (
                'id' => 26,
                'name' => 'ng/l',
            ),
            26 =>
            array (
                'id' => 27,
                'name' => 'ug/24h',
            ),
            27 =>
            array (
                'id' => 28,
                'name' => 'IU/mL',
            ),
            28 =>
            array (
                'id' => 29,
                'name' => 'μg/dL',
            ),
            29 =>
            array (
                'id' => 30,
                'name' => 'mOsmol/kg H2O',
            ),
            30 =>
            array (
                'id' => 31,
                'name' => 'mm/hour',
            ),
            31 =>
            array (
                'id' => 32,
                'name' => 'N',
            ),
            32 =>
            array (
                'id' => 33,
                'name' => 'col/l',
            ),
            33 =>
            array (
                'id' => 34,
                'name' => '',
            ),
            34 =>
            array (
                'id' => 35,
                'name' => 'AU/ml',
            ),
            35 =>
            array (
                'id' => 36,
                'name' => 'unit/ml',
            ),
            36 =>
            array (
                'id' => 37,
                'name' => 'mEq/L',
            ),
            37 =>
            array (
                'id' => 38,
                'name' => '',
            ),
            38 =>
            array (
                'id' => 39,
                'name' => ' μIU/ml',
            ),
            39 =>
            array (
                'id' => 40,
                'name' => 'mIU/ml',
            ),
            40 =>
            array (
                'id' => 41,
                'name' => 'µg/dL',
            ),
            41 =>
            array (
                'id' => 42,
                'name' => 'µg/L',
            ),
            42 =>
            array (
                'id' => 43,
                'name' => 'pg/ml',
            ),
            43 =>
            array (
                'id' => 44,
                'name' => 'ng/dl',
            ),
            44 =>
            array (
                'id' => 45,
                'name' => 'µg/dl',
            ),
            45 =>
            array (
                'id' => 46,
                'name' => 'unit/ml',
            ),
            46 =>
            array (
                'id' => 47,
                'name' => 'ug FEU/ml',
            ),
            47 =>
            array (
                'id' => 48,
                'name' => 'µmol/L',
            ),
            48 =>
            array (
                'id' => 49,
                'name' => 'mUI/L',
            ),
            49 =>
            array (
                'id' => 50,
                'name' => 'mUI/L',
            ),
            50 =>
            array (
                'id' => 51,
                'name' => 'pmol/l',
            ),
            51 =>
            array (
                'id' => 52,
                'name' => 'pmol/l',
            ),
            52 =>
            array (
                'id' => 53,
                'name' => 'ng/ml',
            ),
            53 =>
            array (
                'id' => 54,
                'name' => 'ng/ml',
            ),
            54 =>
            array (
                'id' => 55,
                'name' => 'ng/ml',
            ),
            55 =>
            array (
                'id' => 56,
                'name' => 'ng/ml',
            ),
            56 =>
            array (
                'id' => 57,
                'name' => 'MIU/ml',
            ),
            57 =>
            array (
                'id' => 58,
                'name' => 'MIU/ml',
            ),
            58 =>
            array (
                'id' => 59,
                'name' => 'mg/dl',
            ),
            59 =>
            array (
                'id' => 60,
                'name' => 'mg/dl',
            ),
            60 =>
            array (
                'id' => 61,
                'name' => 'mg/L',
            ),
            61 =>
            array (
                'id' => 62,
                'name' => 'mg/day',
            ),
            62 =>
            array (
                'id' => 63,
                'name' => 'g/day',
            ),
            63 =>
            array (
                'id' => 64,
                'name' => 'umol/ml',
            ),
            64 =>
            array (
                'id' => 65,
                'name' => 'U/ML',
            ),
            65 =>
            array (
                'id' => 66,
                'name' => 'Ru/Ml',
            ),
            66 =>
            array (
                'id' => 67,
                'name' => '10^9/L',
            ),
            67 =>
            array (
                'id' => 68,
                'name' => '10^12/L',
            ),
            68 =>
            array (
                'id' => 69,
                'name' => 'pg/ml',
            ),
            69 =>
            array (
                'id' => 70,
                'name' => '0',
            ),
            70 =>
            array (
                'id' => 71,
                'name' => 'mg/g',
            ),
            71 =>
            array (
                'id' => 72,
                'name' => 'index/ml',
            ),
            72 =>
            array (
                'id' => 73,
                'name' => 'Molecular Biology',
            ),
            73 =>
            array (
                'id' => 74,
                'name' => 'mg/24h',
            ),
            74 =>
            array (
                'id' => 75,
                'name' => 'ug/day',
            ),
            75 =>
            array (
                'id' => 76,
                'name' => 'AU/ml',
            ),
            76 =>
            array (
                'id' => 77,
                'name' => 'IU/ml',
            ),
            77 =>
            array (
                'id' => 78,
                'name' => 'IU/l',
            ),
            78 =>
            array (
                'id' => 79,
                'name' => 'g/l',
            ),
            79 =>
            array (
                'id' => 80,
                'name' => 'U/ml',
            ),
            80 =>
            array (
                'id' => 81,
                'name' => 'IU/ml',
            ),
            81 =>
            array (
                'id' => 82,
                'name' => 'IU/ml',
            ),
            82 =>
            array (
                'id' => 83,
                'name' => 'mg/ml',
            ),
            83 =>
            array (
                'id' => 84,
                'name' => '%',
            ),
            84 =>
            array (
                'id' => 85,
                'name' => '%',
            ),
            85 =>
            array (
                'id' => 86,
                'name' => 'IU/ml',
            ),
            86 =>
            array (
                'id' => 87,
                'name' => '/L ',
            ),
            87 =>
            array (
                'id' => 88,
                'name' => 'mg albumin/mmol crea',
            ),
        ));


    }
}
