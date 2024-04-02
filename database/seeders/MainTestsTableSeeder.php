<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MainTestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('main_tests')->delete();
        
        \DB::table('main_tests')->insert(array (
            0 => 
            array (
                'id' => 1,
                'main_test_name' => 'CBC',
                'pack_id' => 1,
                'pageBreak' => 1,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            1 => 
            array (
                'id' => 2,
                'main_test_name' => 'Urine-General',
                'pack_id' => 6,
                'pageBreak' => 1,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            2 => 
            array (
                'id' => 3,
                'main_test_name' => 'Stool general',
                'pack_id' => 5,
                'pageBreak' => 1,
                'container_id' => 5,
                'lab_perc' => 0.0,
            ),
            3 => 
            array (
                'id' => 4,
                'main_test_name' => 'Malaria-Ag',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 9,
                'lab_perc' => 0.0,
            ),
            4 => 
            array (
                'id' => 5,
                'main_test_name' => 'BFFM',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 9,
                'lab_perc' => 0.0,
            ),
            5 => 
            array (
                'id' => 6,
                'main_test_name' => 'H.pylori Ab',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            6 => 
            array (
                'id' => 7,
                'main_test_name' => 'H.pylori-Ag',
                'pack_id' => 5,
                'pageBreak' => 0,
                'container_id' => 5,
                'lab_perc' => 0.0,
            ),
            7 => 
            array (
                'id' => 8,
                'main_test_name' => 'RBS',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            8 => 
            array (
                'id' => 9,
                'main_test_name' => 'HbA1c',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            9 => 
            array (
                'id' => 10,
                'main_test_name' => 'FBS',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 3,
                'lab_perc' => 0.0,
            ),
            10 => 
            array (
                'id' => 11,
                'main_test_name' => '2HR PP GLUCOSE',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            11 => 
            array (
                'id' => 12,
                'main_test_name' => 'Renal profile',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            12 => 
            array (
                'id' => 14,
                'main_test_name' => 'Lipid profile ',
                'pack_id' => 2,
                'pageBreak' => 1,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            13 => 
            array (
                'id' => 15,
                'main_test_name' => 'HBsAg Rapid Test ',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            14 => 
            array (
                'id' => 16,
                'main_test_name' => 'HCV Rapid Test ',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            15 => 
            array (
                'id' => 17,
                'main_test_name' => 'HIV Rapid Test ',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            16 => 
            array (
                'id' => 18,
                'main_test_name' => 'Viral Screening',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            17 => 
            array (
                'id' => 19,
                'main_test_name' => 'Pt & INR',
                'pack_id' => 8,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            18 => 
            array (
                'id' => 20,
                'main_test_name' => 'PTT',
                'pack_id' => 8,
                'pageBreak' => 1,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            19 => 
            array (
                'id' => 21,
                'main_test_name' => 'Total-wbc',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            20 => 
            array (
                'id' => 22,
                'main_test_name' => 'Total&differential',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            21 => 
            array (
                'id' => 23,
                'main_test_name' => 'hemoglobin',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            22 => 
            array (
                'id' => 24,
                'main_test_name' => 'ASO',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            23 => 
            array (
                'id' => 25,
            'main_test_name' => 'CRP(Quan)',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            24 => 
            array (
                'id' => 26,
                'main_test_name' => 'RF',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            25 => 
            array (
                'id' => 27,
                'main_test_name' => 'ESR`',
                'pack_id' => 10,
                'pageBreak' => 0,
                'container_id' => 7,
                'lab_perc' => 0.0,
            ),
            26 => 
            array (
                'id' => 28,
            'main_test_name' => 'Pregnancy(SERUM)',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            27 => 
            array (
                'id' => 29,
            'main_test_name' => 'Pregnancy(urine)',
                'pack_id' => 6,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            28 => 
            array (
                'id' => 31,
                'main_test_name' => 'Urea',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            29 => 
            array (
                'id' => 32,
                'main_test_name' => 'Creatinine',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            30 => 
            array (
                'id' => 33,
                'main_test_name' => 'Uric Acid',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            31 => 
            array (
                'id' => 35,
                'main_test_name' => 'Calcium',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            32 => 
            array (
                'id' => 36,
                'main_test_name' => 'Phosphorus',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            33 => 
            array (
                'id' => 38,
                'main_test_name' => 'Troponin',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            34 => 
            array (
                'id' => 39,
                'main_test_name' => 'Occult-Blood',
                'pack_id' => 5,
                'pageBreak' => 0,
                'container_id' => 5,
                'lab_perc' => 0.0,
            ),
            35 => 
            array (
                'id' => 41,
            'main_test_name' => 'HbsAg(Quan)',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            36 => 
            array (
                'id' => 42,
            'main_test_name' => 'HCV(Quan)',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            37 => 
            array (
                'id' => 43,
            'main_test_name' => 'HIV(Quan)',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            38 => 
            array (
                'id' => 45,
                'main_test_name' => 'widal-for-enterica',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            39 => 
            array (
                'id' => 46,
                'main_test_name' => 'widal for brucella',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            40 => 
            array (
                'id' => 47,
                'main_test_name' => 'HDL',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            41 => 
            array (
                'id' => 49,
                'main_test_name' => 'LDL',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            42 => 
            array (
                'id' => 51,
                'main_test_name' => 'Blood-group',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            43 => 
            array (
                'id' => 55,
                'main_test_name' => 'Clotting time',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 11,
                'lab_perc' => 0.0,
            ),
            44 => 
            array (
                'id' => 56,
                'main_test_name' => 'Bleeding time',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 11,
                'lab_perc' => 0.0,
            ),
            45 => 
            array (
                'id' => 70,
            'main_test_name' => 'Sodium (Na+)',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            46 => 
            array (
                'id' => 71,
            'main_test_name' => 'Potassium (K+)',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            47 => 
            array (
                'id' => 76,
                'main_test_name' => 'Total PSA',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            48 => 
            array (
                'id' => 77,
                'main_test_name' => 'ANA',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            49 => 
            array (
                'id' => 78,
                'main_test_name' => 'Retic count',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            50 => 
            array (
                'id' => 79,
                'main_test_name' => 'Syphilis Ab',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            51 => 
            array (
                'id' => 80,
                'main_test_name' => 'Platelets count',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            52 => 
            array (
                'id' => 82,
                'main_test_name' => 'Serum iron',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            53 => 
            array (
                'id' => 85,
                'main_test_name' => 'Vit-B12 ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            54 => 
            array (
                'id' => 88,
                'main_test_name' => 'B-HCG ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            55 => 
            array (
                'id' => 89,
                'main_test_name' => 'CA 19-9',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            56 => 
            array (
                'id' => 90,
                'main_test_name' => 'Vit-D',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            57 => 
            array (
                'id' => 91,
                'main_test_name' => 'CA 125',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            58 => 
            array (
                'id' => 92,
                'main_test_name' => 'CA 15-3',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            59 => 
            array (
                'id' => 93,
                'main_test_name' => 'ds.DNA',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            60 => 
            array (
                'id' => 94,
                'main_test_name' => 'Anti CCP G',
                'pack_id' => 9,
                'pageBreak' => 1,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            61 => 
            array (
                'id' => 98,
                'main_test_name' => 'F.PSA',
                'pack_id' => 3,
                'pageBreak' => 1,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            62 => 
            array (
                'id' => 100,
                'main_test_name' => 'Cortizol',
                'pack_id' => 3,
                'pageBreak' => 1,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            63 => 
            array (
                'id' => 106,
                'main_test_name' => 'AFP ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            64 => 
            array (
                'id' => 107,
                'main_test_name' => 'PTH ',
                'pack_id' => 3,
                'pageBreak' => 1,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            65 => 
            array (
                'id' => 108,
                'main_test_name' => 'CEA ',
                'pack_id' => 3,
                'pageBreak' => 1,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            66 => 
            array (
                'id' => 110,
                'main_test_name' => 'Ferritin',
                'pack_id' => 3,
                'pageBreak' => 1,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            67 => 
            array (
                'id' => 112,
                'main_test_name' => 'TIBC',
                'pack_id' => 3,
                'pageBreak' => 1,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            68 => 
            array (
                'id' => 113,
                'main_test_name' => 'AMH ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            69 => 
            array (
                'id' => 114,
                'main_test_name' => 'TOXO IgG',
                'pack_id' => 9,
                'pageBreak' => 1,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            70 => 
            array (
                'id' => 115,
                'main_test_name' => 'TOXO IgM',
                'pack_id' => 9,
                'pageBreak' => 1,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            71 => 
            array (
                'id' => 116,
                'main_test_name' => 'Rubella IgG',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            72 => 
            array (
                'id' => 117,
                'main_test_name' => 'Rubella IgM',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            73 => 
            array (
                'id' => 118,
                'main_test_name' => 'CMV IgG',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            74 => 
            array (
                'id' => 119,
                'main_test_name' => 'CMV IgM',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            75 => 
            array (
                'id' => 120,
                'main_test_name' => 'HSV-1/2 IgG',
                'pack_id' => 9,
                'pageBreak' => 1,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            76 => 
            array (
                'id' => 121,
                'main_test_name' => 'HSV-2 IgM',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            77 => 
            array (
                'id' => 122,
                'main_test_name' => 'HSV-1/2 IgM',
                'pack_id' => 9,
                'pageBreak' => 1,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            78 => 
            array (
                'id' => 124,
                'main_test_name' => 'LDH',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            79 => 
            array (
                'id' => 125,
                'main_test_name' => 'bloodGas',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            80 => 
            array (
                'id' => 126,
                'main_test_name' => 'Urine-Culture',
                'pack_id' => 7,
                'pageBreak' => 1,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            81 => 
            array (
                'id' => 131,
                'main_test_name' => 'TPHA for Syphis',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            82 => 
            array (
                'id' => 133,
                'main_test_name' => 'Electrolytes',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            83 => 
            array (
                'id' => 147,
            'main_test_name' => '25-(OH) vitamin D v',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            84 => 
            array (
                'id' => 149,
                'main_test_name' => 'Thyroid Function ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            85 => 
            array (
                'id' => 153,
                'main_test_name' => 'Fertility profile ',
                'pack_id' => 3,
                'pageBreak' => 1,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            86 => 
            array (
                'id' => 155,
                'main_test_name' => 'Ict for typhoid Ab ',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            87 => 
            array (
                'id' => 156,
                'main_test_name' => 'Magnesium ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            88 => 
            array (
                'id' => 162,
                'main_test_name' => 'Total-protien ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            89 => 
            array (
                'id' => 163,
                'main_test_name' => 'Albumin',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            90 => 
            array (
                'id' => 164,
                'main_test_name' => 'Total-bilirubin',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            91 => 
            array (
                'id' => 165,
                'main_test_name' => 'Direct-bilirubin',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            92 => 
            array (
                'id' => 166,
                'main_test_name' => 'ALP',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            93 => 
            array (
                'id' => 168,
                'main_test_name' => 'AST',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            94 => 
            array (
                'id' => 169,
                'main_test_name' => 'ALT',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            95 => 
            array (
                'id' => 179,
                'main_test_name' => 'Cholesterol',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            96 => 
            array (
                'id' => 180,
                'main_test_name' => 'Triglyceride',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            97 => 
            array (
                'id' => 181,
                'main_test_name' => 'Sickling test ',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            98 => 
            array (
                'id' => 182,
                'main_test_name' => 'VDRL ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            99 => 
            array (
                'id' => 183,
                'main_test_name' => 'stool for reducinge substance ',
                'pack_id' => 5,
                'pageBreak' => 0,
                'container_id' => 5,
                'lab_perc' => 0.0,
            ),
            100 => 
            array (
                'id' => 184,
                'main_test_name' => 'Free thyroid ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            101 => 
            array (
                'id' => 185,
                'main_test_name' => 'progesterone ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            102 => 
            array (
                'id' => 186,
                'main_test_name' => 'ACTH ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            103 => 
            array (
                'id' => 188,
                'main_test_name' => 'amylase ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            104 => 
            array (
                'id' => 189,
                'main_test_name' => 'lipase ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            105 => 
            array (
                'id' => 193,
                'main_test_name' => 'iron profile ',
                'pack_id' => 1,
                'pageBreak' => 1,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            106 => 
            array (
                'id' => 194,
                'main_test_name' => 'scalp scraping for fungi ',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            107 => 
            array (
                'id' => 195,
                'main_test_name' => 'ANA profile ',
                'pack_id' => 9,
                'pageBreak' => 1,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            108 => 
            array (
                'id' => 196,
                'main_test_name' => 'Urea breath test ',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 10,
                'lab_perc' => 0.0,
            ),
            109 => 
            array (
                'id' => 197,
                'main_test_name' => 'Semen analysis ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            110 => 
            array (
                'id' => 198,
                'main_test_name' => 'cortisol A.M',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            111 => 
            array (
                'id' => 199,
                'main_test_name' => 'cortisol P.M',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            112 => 
            array (
                'id' => 200,
                'main_test_name' => 'HAV ',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            113 => 
            array (
                'id' => 202,
                'main_test_name' => 'HBeAg ',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            114 => 
            array (
                'id' => 203,
                'main_test_name' => 'Swab for c/s ',
                'pack_id' => 7,
                'pageBreak' => 1,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            115 => 
            array (
                'id' => 204,
                'main_test_name' => 'Anti-Cardiolipin IgG ',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            116 => 
            array (
                'id' => 205,
                'main_test_name' => 'Anti-Cardiolipin IgM ',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            117 => 
            array (
                'id' => 206,
                'main_test_name' => 'TORCH ',
                'pack_id' => 7,
                'pageBreak' => 1,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            118 => 
            array (
                'id' => 207,
                'main_test_name' => 'PCR for HBV ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            119 => 
            array (
                'id' => 211,
                'main_test_name' => 'ict for covid-19 ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            120 => 
            array (
                'id' => 216,
                'main_test_name' => 'D-dimer ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            121 => 
            array (
                'id' => 217,
                'main_test_name' => ' Swab for COVID Ag test ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            122 => 
            array (
                'id' => 218,
                'main_test_name' => 'CRP latex ',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            123 => 
            array (
                'id' => 219,
                'main_test_name' => 'RF Latex',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            124 => 
            array (
                'id' => 220,
                'main_test_name' => 'ASO latex ',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            125 => 
            array (
                'id' => 221,
                'main_test_name' => 'Covid Ab ',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            126 => 
            array (
                'id' => 226,
                'main_test_name' => 'FT4 ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            127 => 
            array (
                'id' => 229,
                'main_test_name' => 'FT3 ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            128 => 
            array (
                'id' => 230,
                'main_test_name' => 'Testosterone  ',
                'pack_id' => 3,
                'pageBreak' => 1,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            129 => 
            array (
                'id' => 231,
                'main_test_name' => 'CK ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            130 => 
            array (
                'id' => 232,
                'main_test_name' => 'T3 ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            131 => 
            array (
                'id' => 233,
                'main_test_name' => 'T4 ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            132 => 
            array (
                'id' => 234,
                'main_test_name' => 'FSH ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            133 => 
            array (
                'id' => 236,
                'main_test_name' => 'LH ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            134 => 
            array (
                'id' => 237,
                'main_test_name' => 'PRL ',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            135 => 
            array (
                'id' => 238,
                'main_test_name' => 'Indirect Bilirubin ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            136 => 
            array (
                'id' => 239,
                'main_test_name' => 'Hb Electrophoresis ',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            137 => 
            array (
                'id' => 240,
                'main_test_name' => 'CK MB ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            138 => 
            array (
                'id' => 241,
                'main_test_name' => 'Ict for TB ',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            139 => 
            array (
                'id' => 242,
                'main_test_name' => 'Autoimmune liver diseases  ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            140 => 
            array (
                'id' => 243,
                'main_test_name' => 'T.O.R.C.H Profile  ',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            141 => 
            array (
                'id' => 246,
                'main_test_name' => 'semen culture ',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            142 => 
            array (
                'id' => 247,
                'main_test_name' => 'Hair scraping ',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            143 => 
            array (
                'id' => 248,
                'main_test_name' => 'Nail scraping  ',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            144 => 
            array (
                'id' => 249,
                'main_test_name' => 'Skin scraping ',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            145 => 
            array (
                'id' => 265,
                'main_test_name' => 'alblumin creatinine ratio',
                'pack_id' => 6,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            146 => 
            array (
                'id' => 266,
                'main_test_name' => '24 H urine protien',
                'pack_id' => 6,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            147 => 
            array (
                'id' => 267,
            'main_test_name' => 'Protein creatinine ration (PCR)',
                'pack_id' => 6,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            148 => 
            array (
                'id' => 268,
            'main_test_name' => 'Random Creatinine (urine)',
                'pack_id' => 6,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            149 => 
            array (
                'id' => 269,
                'main_test_name' => 'Urine for drugs sensitivity',
                'pack_id' => 6,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            150 => 
            array (
                'id' => 270,
                'main_test_name' => 'ANA screeing',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            151 => 
            array (
                'id' => 271,
                'main_test_name' => 'C.peptide',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            152 => 
            array (
                'id' => 272,
                'main_test_name' => 'Anti-ccp Snibe ',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            153 => 
            array (
                'id' => 273,
                'main_test_name' => 'Insuline Level',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            154 => 
            array (
                'id' => 275,
            'main_test_name' => 'Body fluid (TWBCs & differential)',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            155 => 
            array (
                'id' => 276,
                'main_test_name' => 'Lupus Anticoagulant',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            156 => 
            array (
                'id' => 277,
                'main_test_name' => 'Anti Tissue transglutaminase IgG',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            157 => 
            array (
                'id' => 278,
                'main_test_name' => 'Anti Tissue transglutaminase IgA',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            158 => 
            array (
                'id' => 279,
            'main_test_name' => 'ANCA (Anti PR3 IgG)',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            159 => 
            array (
                'id' => 280,
                'main_test_name' => 'Anti-beta 2- Glycoproten Screen',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            160 => 
            array (
                'id' => 281,
                'main_test_name' => 'IgM',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            161 => 
            array (
                'id' => 282,
            'main_test_name' => 'Complement (C4)',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            162 => 
            array (
                'id' => 283,
            'main_test_name' => 'Complement (C3 c)',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            163 => 
            array (
                'id' => 285,
                'main_test_name' => 'SERUM IgE',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            164 => 
            array (
                'id' => 286,
            'main_test_name' => 'ANCA (Anti MPO IgG)',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            165 => 
            array (
                'id' => 287,
                'main_test_name' => 'HIV PCR',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            166 => 
            array (
                'id' => 288,
                'main_test_name' => 'IgA',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            167 => 
            array (
                'id' => 289,
            'main_test_name' => 'ANCA-p(Anti MPO  IgG)',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            168 => 
            array (
                'id' => 290,
                'main_test_name' => 'ASMA IF',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            169 => 
            array (
                'id' => 291,
                'main_test_name' => 'HCV PCR',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            170 => 
            array (
                'id' => 292,
                'main_test_name' => 'CD 45',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            171 => 
            array (
                'id' => 293,
                'main_test_name' => 'CD 3',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            172 => 
            array (
                'id' => 294,
                'main_test_name' => 'CD 15',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            173 => 
            array (
                'id' => 295,
                'main_test_name' => 'CD 30',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            174 => 
            array (
                'id' => 296,
                'main_test_name' => 'CD 10',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            175 => 
            array (
                'id' => 297,
                'main_test_name' => 'CD 34 class II',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            176 => 
            array (
                'id' => 298,
                'main_test_name' => 'CD 117',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            177 => 
            array (
                'id' => 299,
                'main_test_name' => 'CD 20',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            178 => 
            array (
                'id' => 300,
            'main_test_name' => 'Pleural Fluid (protein)',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            179 => 
            array (
                'id' => 301,
            'main_test_name' => 'ASCEITIC fluid (protein)',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            180 => 
            array (
                'id' => 302,
            'main_test_name' => 'Body Fluid (G+P)',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            181 => 
            array (
                'id' => 303,
                'main_test_name' => 'CD 68',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            182 => 
            array (
                'id' => 304,
                'main_test_name' => 'ZN Stain for AFB once',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            183 => 
            array (
                'id' => 305,
            'main_test_name' => 'ZN Stain for AFB (3 times)',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            184 => 
            array (
                'id' => 306,
                'main_test_name' => 'Direct Gram Stain',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            185 => 
            array (
                'id' => 307,
                'main_test_name' => 'CSF C/S',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            186 => 
            array (
                'id' => 308,
                'main_test_name' => 'CD- CK',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            187 => 
            array (
                'id' => 309,
                'main_test_name' => 'K167',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            188 => 
            array (
                'id' => 310,
                'main_test_name' => 'Tisue transglutaminase Ab',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            189 => 
            array (
                'id' => 311,
                'main_test_name' => 'Acid phosphatase',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            190 => 
            array (
                'id' => 312,
                'main_test_name' => 'S. Lithium',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            191 => 
            array (
                'id' => 313,
            'main_test_name' => 'CSF Fluid ( G+P)',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            192 => 
            array (
                'id' => 317,
                'main_test_name' => 'Factor VIII activity',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            193 => 
            array (
                'id' => 318,
                'main_test_name' => 'Factor IX activity',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            194 => 
            array (
                'id' => 319,
                'main_test_name' => 'Fiberinogen Level',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            195 => 
            array (
                'id' => 320,
                'main_test_name' => 'L.E.Cell',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            196 => 
            array (
                'id' => 321,
                'main_test_name' => 'Protein electrophoresis',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            197 => 
            array (
                'id' => 322,
                'main_test_name' => 'Hb electrophoresis',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            198 => 
            array (
                'id' => 323,
                'main_test_name' => 'Urine Creatinin',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            199 => 
            array (
                'id' => 324,
                'main_test_name' => 'Urine Amylase',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            200 => 
            array (
                'id' => 325,
                'main_test_name' => 'Urine for Na',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            201 => 
            array (
                'id' => 326,
                'main_test_name' => 'Urine for Ca',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            202 => 
            array (
                'id' => 327,
                'main_test_name' => 'Urine for Ca + Po4',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            203 => 
            array (
                'id' => 328,
                'main_test_name' => 'eG.F.R',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            204 => 
            array (
                'id' => 329,
                'main_test_name' => 'G6PD',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            205 => 
            array (
                'id' => 330,
                'main_test_name' => 'Urine for CL',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            206 => 
            array (
                'id' => 331,
                'main_test_name' => 'Urine for Phosphorus',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            207 => 
            array (
                'id' => 332,
                'main_test_name' => 'Urine for K',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            208 => 
            array (
                'id' => 333,
                'main_test_name' => 'Blood Urea Nitrogen',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            209 => 
            array (
                'id' => 334,
                'main_test_name' => 'Creatinin Clearance',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            210 => 
            array (
                'id' => 335,
                'main_test_name' => 'Urine For Microalbumineuria',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            211 => 
            array (
                'id' => 336,
            'main_test_name' => 'Human Growth Hormone (hGH)',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            212 => 
            array (
                'id' => 337,
                'main_test_name' => 'Lactose Tolerance Test',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            213 => 
            array (
                'id' => 339,
            'main_test_name' => 'Anti-HCV (elisa)',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            214 => 
            array (
                'id' => 340,
                'main_test_name' => 'Anti-HAV IgM',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            215 => 
            array (
                'id' => 341,
                'main_test_name' => 'HBV PCR',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            216 => 
            array (
                'id' => 342,
            'main_test_name' => 'HBeAg (elisa)',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            217 => 
            array (
                'id' => 343,
                'main_test_name' => 'TB DNA level',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            218 => 
            array (
                'id' => 344,
                'main_test_name' => 'Cytomegalo Virus abs',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            219 => 
            array (
                'id' => 345,
                'main_test_name' => 'Cyclosporine',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            220 => 
            array (
                'id' => 346,
                'main_test_name' => 'Cyclic Citrullinate Peptide Ab',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            221 => 
            array (
                'id' => 347,
                'main_test_name' => 'Viral Panel',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            222 => 
            array (
                'id' => 348,
                'main_test_name' => 'HB A2 Estmation',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            223 => 
            array (
                'id' => 349,
                'main_test_name' => 'Red Blood Cells Allo Ab screen',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            224 => 
            array (
                'id' => 350,
                'main_test_name' => 'iron p',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            225 => 
            array (
                'id' => 352,
                'main_test_name' => 'Sputum for Fungal',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            226 => 
            array (
                'id' => 353,
                'main_test_name' => 'Sputum for Culture',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            227 => 
            array (
                'id' => 354,
                'main_test_name' => 'Pleural Fluid Glucose & Protien',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            228 => 
            array (
                'id' => 355,
                'main_test_name' => 'Body Fluid for LDH',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            229 => 
            array (
                'id' => 356,
                'main_test_name' => 'Direct Gram Stain',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            230 => 
            array (
                'id' => 357,
                'main_test_name' => 'Zn  Stain for AFB',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            231 => 
            array (
                'id' => 358,
                'main_test_name' => 'PCR FOR TB',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            232 => 
            array (
                'id' => 359,
                'main_test_name' => 'Plural Fluid for ADA',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            233 => 
            array (
                'id' => 360,
                'main_test_name' => 'Celiac Disease Screen',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 3,
                'lab_perc' => 0.0,
            ),
            234 => 
            array (
                'id' => 361,
                'main_test_name' => 'Body fluid for cell & differential',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            235 => 
            array (
                'id' => 363,
                'main_test_name' => 'FNA Histopathology',
                'pack_id' => 11,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            236 => 
            array (
                'id' => 364,
                'main_test_name' => 'Estradiol E2',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            237 => 
            array (
                'id' => 365,
                'main_test_name' => 'TSH',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            238 => 
            array (
                'id' => 366,
                'main_test_name' => 'Anti T.P.O',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            239 => 
            array (
                'id' => 367,
                'main_test_name' => 'Pro-BNP',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            240 => 
            array (
                'id' => 369,
                'main_test_name' => 'Serum Ceuroplasmin',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            241 => 
            array (
                'id' => 370,
                'main_test_name' => 'Hbs Ab',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            242 => 
            array (
                'id' => 371,
                'main_test_name' => 'Hbc IgM',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            243 => 
            array (
                'id' => 372,
                'main_test_name' => 'HE4',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            244 => 
            array (
                'id' => 373,
                'main_test_name' => 'RK-39',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            245 => 
            array (
                'id' => 374,
                'main_test_name' => 'Hebatitis B virus panel',
                'pack_id' => 12,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            246 => 
            array (
                'id' => 375,
                'main_test_name' => 'Protien Electrophoresis',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            247 => 
            array (
                'id' => 376,
                'main_test_name' => 'CSF Analysis',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            248 => 
            array (
                'id' => 377,
                'main_test_name' => 'Albumin Creatinine Ratio',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            249 => 
            array (
                'id' => 378,
                'main_test_name' => 'Liver Profile',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            250 => 
            array (
                'id' => 379,
                'main_test_name' => 'ACR',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            251 => 
            array (
                'id' => 380,
                'main_test_name' => 'Ionized Ca',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            252 => 
            array (
                'id' => 382,
                'main_test_name' => 'Total Serum Bilirubin',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            253 => 
            array (
                'id' => 384,
                'main_test_name' => 'PCR For T.B',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            254 => 
            array (
                'id' => 385,
                'main_test_name' => 'Arterial Blood Gas',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            255 => 
            array (
                'id' => 386,
                'main_test_name' => 'Protein C activity',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            256 => 
            array (
                'id' => 387,
                'main_test_name' => 'Protein S activity',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            257 => 
            array (
                'id' => 3000,
                'main_test_name' => 'CBC',
                'pack_id' => 3,
                'pageBreak' => 1,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            258 => 
            array (
                'id' => 3001,
            'main_test_name' => 'Glucose Tolerant Test (G.T.T)',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            259 => 
            array (
                'id' => 3002,
                'main_test_name' => '24 H Urine Calcium',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            260 => 
            array (
                'id' => 3003,
                'main_test_name' => '24Hrs Urine Copper',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            261 => 
            array (
                'id' => 3004,
                'main_test_name' => 'Ascetic Fluid Analysis',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            262 => 
            array (
                'id' => 3005,
                'main_test_name' => 'Acetylcholine Receptor Ab',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            263 => 
            array (
                'id' => 3006,
                'main_test_name' => 'Anti-diuertic Hormone',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            264 => 
            array (
                'id' => 3007,
                'main_test_name' => 'AMA-M2',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            265 => 
            array (
                'id' => 3008,
            'main_test_name' => 'ANA (IIFA)',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            266 => 
            array (
                'id' => 3009,
                'main_test_name' => 'ANCA-P',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            267 => 
            array (
                'id' => 3010,
                'main_test_name' => 'ANCA-C',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            268 => 
            array (
                'id' => 3011,
                'main_test_name' => 'Anti-Endomysial  Ab',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            269 => 
            array (
                'id' => 3012,
                'main_test_name' => 'Anti-thrombin III',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            270 => 
            array (
                'id' => 3013,
                'main_test_name' => 'Anti-gliadin IgG',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            271 => 
            array (
                'id' => 3014,
                'main_test_name' => 'Anti-gliadin IgM',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            272 => 
            array (
                'id' => 3015,
                'main_test_name' => 'Anti-phospholipid IgG',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            273 => 
            array (
                'id' => 3016,
                'main_test_name' => 'Anti-phospholipid IgM',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            274 => 
            array (
                'id' => 3017,
                'main_test_name' => 'Anti-TPO',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            275 => 
            array (
                'id' => 3018,
                'main_test_name' => 'Anti-GBM',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            276 => 
            array (
                'id' => 3019,
                'main_test_name' => 'Anti-TSH Receptor Ab',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            277 => 
            array (
                'id' => 3020,
            'main_test_name' => 'ASMA (IIFA)',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            278 => 
            array (
                'id' => 3021,
                'main_test_name' => 'Gamma GT',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            279 => 
            array (
                'id' => 3022,
                'main_test_name' => 'ICT for COVID-19 IgG',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            280 => 
            array (
                'id' => 3023,
                'main_test_name' => 'ICT for COVID-19 IgM',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            281 => 
            array (
                'id' => 3024,
                'main_test_name' => 'Factor V',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            282 => 
            array (
                'id' => 3025,
                'main_test_name' => 'Folic acid',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            283 => 
            array (
                'id' => 3026,
            'main_test_name' => 'Anti-HBe (HBe Ab)',
                'pack_id' => 12,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            284 => 
            array (
                'id' => 3028,
                'main_test_name' => 'ASCA-IgG',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            285 => 
            array (
                'id' => 3029,
                'main_test_name' => 'ASCA-IgM',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            286 => 
            array (
                'id' => 3030,
                'main_test_name' => 'C1 Esterase inhibitor',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            287 => 
            array (
                'id' => 3031,
                'main_test_name' => 'Serum Copper',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            288 => 
            array (
                'id' => 3032,
                'main_test_name' => 'Direct Coomb\'s',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 9,
                'lab_perc' => 0.0,
            ),
            289 => 
            array (
                'id' => 3033,
                'main_test_name' => 'Indirect coomb\'s Test',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 9,
                'lab_perc' => 0.0,
            ),
            290 => 
            array (
                'id' => 3035,
                'main_test_name' => 'Body fluid Amylase',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            291 => 
            array (
                'id' => 3036,
                'main_test_name' => 'Urine for Bence Johns Protein',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            292 => 
            array (
                'id' => 3037,
                'main_test_name' => 'Anti-tissue transglutaminase IgA',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            293 => 
            array (
                'id' => 3038,
            'main_test_name' => 'Immunoglobulin A (IgA)',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            294 => 
            array (
                'id' => 3039,
                'main_test_name' => 'FOOD Profile',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            295 => 
            array (
                'id' => 3040,
                'main_test_name' => 'HB Electrophoresis',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            296 => 
            array (
                'id' => 3042,
                'main_test_name' => 'Procalcitonin PCT',
                'pack_id' => 12,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            297 => 
            array (
                'id' => 3043,
                'main_test_name' => 'Anti-TG',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            298 => 
            array (
                'id' => 3044,
                'main_test_name' => 'HBc Ab',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            299 => 
            array (
                'id' => 3045,
                'main_test_name' => 'ICT for Toxoplasma',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            300 => 
            array (
                'id' => 3046,
                'main_test_name' => 'Lupus anticoagulent',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            301 => 
            array (
                'id' => 3047,
                'main_test_name' => 'Anti-tissue transglutaminase IgG',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            302 => 
            array (
                'id' => 3048,
                'main_test_name' => 'Total IgE',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            303 => 
            array (
                'id' => 3049,
                'main_test_name' => 'Anti-gliadin IgA',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            304 => 
            array (
                'id' => 3050,
            'main_test_name' => 'Immunoglobulin G (IgG) Level',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            305 => 
            array (
                'id' => 3051,
                'main_test_name' => 'B2-Glycoprotein IgG',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            306 => 
            array (
                'id' => 3052,
                'main_test_name' => 'B2-Glycoprotein IgM',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            307 => 
            array (
                'id' => 3053,
                'main_test_name' => 'Serum ZINC',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            308 => 
            array (
                'id' => 3054,
                'main_test_name' => 'peripheral blood picture',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            309 => 
            array (
                'id' => 3055,
                'main_test_name' => 'Factor Vlll',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            310 => 
            array (
                'id' => 3056,
                'main_test_name' => 'Factor lX',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            311 => 
            array (
                'id' => 3057,
                'main_test_name' => 'Factor VII',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            312 => 
            array (
                'id' => 3058,
                'main_test_name' => 'Factor ll',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            313 => 
            array (
                'id' => 3059,
                'main_test_name' => 'Factor XI',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            314 => 
            array (
                'id' => 3060,
                'main_test_name' => 'Factor Xll',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
            315 => 
            array (
                'id' => 3061,
                'main_test_name' => 'Iron Profile',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            316 => 
            array (
                'id' => 3063,
                'main_test_name' => 'Urine for Sugar and acetone',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            317 => 
            array (
                'id' => 3064,
                'main_test_name' => 'Urine for Hb',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            318 => 
            array (
                'id' => 3065,
                'main_test_name' => 'UG10',
                'pack_id' => 6,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            319 => 
            array (
                'id' => 3066,
                'main_test_name' => 'Gastrin-17',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            320 => 
            array (
                'id' => 3068,
                'main_test_name' => 'Drug of Abuse',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            321 => 
            array (
                'id' => 3069,
                'main_test_name' => 'LKM -1',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            322 => 
            array (
                'id' => 3070,
                'main_test_name' => 'Anti-HbC IgM Ab',
                'pack_id' => 7,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            323 => 
            array (
                'id' => 3073,
                'main_test_name' => 'ICT for Dengue virus',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 9,
                'lab_perc' => 0.0,
            ),
            324 => 
            array (
                'id' => 3074,
                'main_test_name' => '24h Urine Cortisol',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            325 => 
            array (
                'id' => 3075,
                'main_test_name' => 'Urine for Urea',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            326 => 
            array (
                'id' => 3076,
                'main_test_name' => 'Urine for Eosinophil',
                'pack_id' => 6,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            327 => 
            array (
                'id' => 3077,
                'main_test_name' => 'ABG',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            328 => 
            array (
                'id' => 3078,
                'main_test_name' => 'Spot Urine Protein',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            329 => 
            array (
                'id' => 3079,
                'main_test_name' => 'Anti-T.G',
                'pack_id' => 9,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            330 => 
            array (
                'id' => 3080,
                'main_test_name' => 'T.G Level',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            331 => 
            array (
                'id' => 3081,
            'main_test_name' => 'S.Aldesterone   (standing upright position)',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            332 => 
            array (
                'id' => 3082,
            'main_test_name' => 'S.Aldesterone (lying down position)',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            333 => 
            array (
                'id' => 3083,
                'main_test_name' => 'Stool for enterica',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 5,
                'lab_perc' => 0.0,
            ),
            334 => 
            array (
                'id' => 3084,
                'main_test_name' => 'UIBC',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            335 => 
            array (
                'id' => 3085,
            'main_test_name' => 'Immunoglobulin M (IgM)',
                'pack_id' => 1,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            336 => 
            array (
                'id' => 3086,
                'main_test_name' => 'Urine Ca+2',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            337 => 
            array (
                'id' => 3087,
                'main_test_name' => 'Urine Na',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            338 => 
            array (
                'id' => 3088,
                'main_test_name' => 'Urine K',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            339 => 
            array (
                'id' => 3089,
                'main_test_name' => 'Urine Cl',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            340 => 
            array (
                'id' => 3090,
                'main_test_name' => 'Microalbuminuria',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 6,
                'lab_perc' => 0.0,
            ),
            341 => 
            array (
                'id' => 3091,
                'main_test_name' => 'free PSA',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            342 => 
            array (
                'id' => 3092,
                'main_test_name' => 'freePSA',
                'pack_id' => 3,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            343 => 
            array (
                'id' => 3093,
                'main_test_name' => 'Serum CL-',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            344 => 
            array (
                'id' => 3095,
            'main_test_name' => 'Tacrolimus  (prograf,FK506)',
                'pack_id' => 14,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            345 => 
            array (
                'id' => 3096,
            'main_test_name' => 'Tacrolimus (prograf , FK506)',
                'pack_id' => 14,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            346 => 
            array (
                'id' => 3097,
            'main_test_name' => 'Tacrolimus (prograf , FK506)',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            347 => 
            array (
                'id' => 3098,
                'main_test_name' => 'calcium corrected',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 2,
                'lab_perc' => 0.0,
            ),
            348 => 
            array (
                'id' => 3099,
                'main_test_name' => 'Synovial fluid',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            349 => 
            array (
                'id' => 3100,
                'main_test_name' => 'Synovial fluid Analysis',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            350 => 
            array (
                'id' => 3101,
                'main_test_name' => 'Pleural fluid for LDH',
                'pack_id' => 2,
                'pageBreak' => 0,
                'container_id' => 8,
                'lab_perc' => 0.0,
            ),
            351 => 
            array (
                'id' => 3102,
                'main_test_name' => 'ICT for Brucella',
                'pack_id' => 4,
                'pageBreak' => 0,
                'container_id' => 1,
                'lab_perc' => 0.0,
            ),
            352 => 
            array (
                'id' => 3103,
                'main_test_name' => 'FVIII',
                'pack_id' => 8,
                'pageBreak' => 0,
                'container_id' => 4,
                'lab_perc' => 0.0,
            ),
        ));
        
        
    }
}