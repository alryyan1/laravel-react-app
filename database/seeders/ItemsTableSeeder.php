<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('items')->delete();
        
        \DB::table('items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'section_id' => 1,
                'name' => 'EDTA',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'section_id' => 1,
                'name' => 'HEPARIN',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'section_id' => 1,
                'name' => 'PLANE',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'section_id' => 1,
                'name' => 'SODUIM CITRIT',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'section_id' => 1,
                'name' => 'ESR',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            5 => 
            array (
                'id' => 6,
                'section_id' => 1,
                'name' => 'Stiril Urine Container',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'section_id' => 1,
                'name' => 'URINE CONTANOR',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            7 => 
            array (
                'id' => 8,
                'section_id' => 1,
                'name' => 'STOOL CONTANOR',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            8 => 
            array (
                'id' => 9,
                'section_id' => 1,
                'name' => 'HBV',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            9 => 
            array (
                'id' => 10,
                'section_id' => 1,
                'name' => 'HIV',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            10 => 
            array (
                'id' => 11,
                'section_id' => 1,
                'name' => 'HCV',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            11 => 
            array (
                'id' => 12,
                'section_id' => 1,
            'name' => 'MALARIA (Ag)',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            12 => 
            array (
                'id' => 13,
                'section_id' => 1,
                'name' => 'ICT dengue fever',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            13 => 
            array (
                'id' => 14,
                'section_id' => 1,
                'name' => 'Torch Screening',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            14 => 
            array (
                'id' => 15,
                'section_id' => 1,
                'name' => 'ICT Drug Screening',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            15 => 
            array (
                'id' => 16,
                'section_id' => 1,
            'name' => 'TROPONIN (ICT)',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            16 => 
            array (
                'id' => 17,
                'section_id' => 1,
                'name' => 'ICT TYPHOID',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            17 => 
            array (
                'id' => 18,
                'section_id' => 1,
                'name' => 'GLOVES',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            18 => 
            array (
                'id' => 19,
                'section_id' => 1,
                'name' => 'SLIDE',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            19 => 
            array (
                'id' => 20,
                'section_id' => 1,
                'name' => 'VA / NEEDELE',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            20 => 
            array (
                'id' => 21,
                'section_id' => 1,
                'name' => 'DIS / SYRING',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            21 => 
            array (
                'id' => 22,
                'section_id' => 1,
                'name' => 'GAUZE',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            22 => 
            array (
                'id' => 23,
                'section_id' => 1,
                'name' => 'TOURNIQUET',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            23 => 
            array (
                'id' => 24,
                'section_id' => 1,
                'name' => 'D.W',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            24 => 
            array (
                'id' => 25,
                'section_id' => 1,
                'name' => 'YELLOW TIPS',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            25 => 
            array (
                'id' => 26,
                'section_id' => 1,
                'name' => 'DR / AID',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            26 => 
            array (
                'id' => 27,
                'section_id' => 1,
                'name' => 'COVER GLASS',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            27 => 
            array (
                'id' => 28,
                'section_id' => 1,
                'name' => 'ABO',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            28 => 
            array (
                'id' => 29,
                'section_id' => 1,
                'name' => 'PT',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            29 => 
            array (
                'id' => 30,
                'section_id' => 1,
                'name' => 'PTT',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            30 => 
            array (
                'id' => 31,
                'section_id' => 1,
                'name' => 'SSA',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            31 => 
            array (
                'id' => 32,
                'section_id' => 1,
                'name' => 'GLUCOSE $',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            32 => 
            array (
                'id' => 33,
                'section_id' => 1,
                'name' => 'UREA',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            33 => 
            array (
                'id' => 34,
                'section_id' => 1,
                'name' => 'CREATININ',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            34 => 
            array (
                'id' => 35,
                'section_id' => 1,
                'name' => 'U.ACID',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            35 => 
            array (
                'id' => 36,
                'section_id' => 1,
                'name' => 'T. Protein',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            36 => 
            array (
                'id' => 37,
                'section_id' => 1,
                'name' => 'ALB',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            37 => 
            array (
                'id' => 38,
                'section_id' => 1,
                'name' => 'T. Bil',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            38 => 
            array (
                'id' => 39,
                'section_id' => 1,
                'name' => 'ALP',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            39 => 
            array (
                'id' => 40,
                'section_id' => 1,
                'name' => 'ALT',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            40 => 
            array (
                'id' => 41,
                'section_id' => 1,
                'name' => 'Triglycerides',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            41 => 
            array (
                'id' => 42,
                'section_id' => 1,
                'name' => 'HDL',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            42 => 
            array (
                'id' => 43,
                'section_id' => 1,
                'name' => 'LDL',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            43 => 
            array (
                'id' => 44,
                'section_id' => 1,
                'name' => 'CRP',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            44 => 
            array (
                'id' => 45,
                'section_id' => 1,
                'name' => 'AMYLASE',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            45 => 
            array (
                'id' => 46,
                'section_id' => 1,
                'name' => 'ISE-Reagent Pack BS-480',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            46 => 
            array (
                'id' => 47,
                'section_id' => 1,
                'name' => 'Multi Sera C',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            47 => 
            array (
                'id' => 48,
                'section_id' => 1,
                'name' => 'Clinchem Multi Control 1',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            48 => 
            array (
                'id' => 49,
                'section_id' => 1,
                'name' => 'Clinchem Multi Control 2',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            49 => 
            array (
                'id' => 50,
                'section_id' => 1,
                'name' => 'TSH Calibrators',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            50 => 
            array (
                'id' => 51,
                'section_id' => 1,
                'name' => 'TSH ',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            51 => 
            array (
                'id' => 52,
                'section_id' => 1,
                'name' => 'T3',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            52 => 
            array (
                'id' => 53,
                'section_id' => 1,
                'name' => 'Total T4 Calibrators',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            53 => 
            array (
                'id' => 54,
                'section_id' => 1,
                'name' => 'T4',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            54 => 
            array (
                'id' => 55,
                'section_id' => 1,
                'name' => 'FT4',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            55 => 
            array (
                'id' => 56,
                'section_id' => 1,
                'name' => 'FSH',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            56 => 
            array (
                'id' => 57,
                'section_id' => 1,
                'name' => 'LH',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            57 => 
            array (
                'id' => 58,
                'section_id' => 1,
                'name' => 'PRL',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            58 => 
            array (
                'id' => 59,
                'section_id' => 1,
                'name' => 'VIT.D',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            59 => 
            array (
                'id' => 60,
                'section_id' => 1,
                'name' => 'B12',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            60 => 
            array (
                'id' => 61,
                'section_id' => 1,
                'name' => 'Total Beta HCG Calibrators',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            61 => 
            array (
                'id' => 62,
                'section_id' => 1,
                'name' => 'B-HCG',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            62 => 
            array (
                'id' => 63,
                'section_id' => 1,
                'name' => 'Anti -HCV Calibrators',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            63 => 
            array (
                'id' => 64,
                'section_id' => 1,
                'name' => 'Anti -HCV Negative Control',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            64 => 
            array (
                'id' => 65,
                'section_id' => 1,
                'name' => 'Anti -HCV Positive Control',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            65 => 
            array (
                'id' => 66,
                'section_id' => 1,
                'name' => 'HCV',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            66 => 
            array (
                'id' => 67,
                'section_id' => 1,
                'name' => 'HIV',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            67 => 
            array (
                'id' => 68,
                'section_id' => 1,
                'name' => 'Estradiol Calibrators',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            68 => 
            array (
                'id' => 69,
                'section_id' => 1,
                'name' => 'E2',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            69 => 
            array (
                'id' => 70,
                'section_id' => 1,
                'name' => 'FERRITIN Calibrators',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            70 => 
            array (
                'id' => 71,
                'section_id' => 1,
                'name' => 'FERRITIN',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            71 => 
            array (
                'id' => 72,
                'section_id' => 1,
                'name' => 'CEA',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            72 => 
            array (
                'id' => 73,
                'section_id' => 1,
                'name' => 'Urea Breath test',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            73 => 
            array (
                'id' => 74,
                'section_id' => 1,
                'name' => 'M-68FD DYE',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            74 => 
            array (
                'id' => 75,
                'section_id' => 1,
                'name' => 'M-68LB LYSE',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            75 => 
            array (
                'id' => 76,
                'section_id' => 1,
                'name' => 'M-68LD LYSE',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            76 => 
            array (
                'id' => 77,
                'section_id' => 1,
                'name' => 'M-68DS DILUENT',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            77 => 
            array (
                'id' => 78,
                'section_id' => 1,
                'name' => 'IMMUOASSAY Cuvette',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            78 => 
            array (
                'id' => 79,
                'section_id' => 1,
                'name' => 'Wash Buffer Mindray',
                'require_amount' => 0,
                'initial_balance' => 0,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}