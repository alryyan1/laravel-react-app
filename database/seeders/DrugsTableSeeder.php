<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DrugsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('drugs')->delete();
        
        \DB::table('drugs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Amikacin ',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Amoxicillin ',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Ampicillin                                 ',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Aztreonam ',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Bacitracin ',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Carbenicillin ',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Cefaclor  ',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Cefalexin ',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Cefamandole ',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'Cefazolin  ',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'Cefixime ',
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'Cefoperazone  ',
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'Cefotaxime        ',
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'Cefotetan         ',
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'Cefoxitin ',
            ),
            15 => 
            array (
                'id' => 17,
                'name' => 'Cefpirome  ',
            ),
            16 => 
            array (
                'id' => 18,
                'name' => 'Cefpodoxime ',
            ),
            17 => 
            array (
                'id' => 19,
                'name' => 'Cefprozil  ',
            ),
            18 => 
            array (
                'id' => 20,
                'name' => 'Cefsulodin ',
            ),
            19 => 
            array (
                'id' => 21,
                'name' => 'Ceftazidime',
            ),
            20 => 
            array (
                'id' => 22,
                'name' => 'Ceftibuten ',
            ),
            21 => 
            array (
                'id' => 23,
                'name' => 'Ceftriaxone',
            ),
            22 => 
            array (
                'id' => 24,
                'name' => 'Cefuroxime',
            ),
            23 => 
            array (
                'id' => 25,
                'name' => 'Cephalotin',
            ),
            24 => 
            array (
                'id' => 26,
                'name' => 'Chloramphenicol',
            ),
            25 => 
            array (
                'id' => 27,
                'name' => 'Ciprofloxacin',
            ),
            26 => 
            array (
                'id' => 28,
                'name' => 'Clarithromycin',
            ),
            27 => 
            array (
                'id' => 29,
                'name' => 'Clindamycin',
            ),
            28 => 
            array (
                'id' => 30,
                'name' => 'Colistin',
            ),
            29 => 
            array (
                'id' => 31,
                'name' => 'Doripenem',
            ),
            30 => 
            array (
                'id' => 32,
                'name' => 'Doxycycline',
            ),
            31 => 
            array (
                'id' => 33,
                'name' => 'Ertapenem',
            ),
            32 => 
            array (
                'id' => 34,
                'name' => 'Erythromycine',
            ),
            33 => 
            array (
                'id' => 35,
                'name' => 'Flumequine',
            ),
            34 => 
            array (
                'id' => 36,
                'name' => 'Fosfomycin',
            ),
            35 => 
            array (
                'id' => 37,
                'name' => 'Fusidic Acid',
            ),
            36 => 
            array (
                'id' => 38,
                'name' => 'Gentamicin',
            ),
            37 => 
            array (
                'id' => 39,
                'name' => 'Imipenem',
            ),
            38 => 
            array (
                'id' => 40,
                'name' => 'Isepamicin',
            ),
            39 => 
            array (
                'id' => 41,
                'name' => 'Kanamycin',
            ),
            40 => 
            array (
                'id' => 42,
                'name' => 'Levofloxacin',
            ),
            41 => 
            array (
                'id' => 43,
                'name' => 'Lincomycin',
            ),
            42 => 
            array (
                'id' => 44,
                'name' => 'Linezolid',
            ),
            43 => 
            array (
                'id' => 45,
                'name' => 'Mecillinam',
            ),
            44 => 
            array (
                'id' => 46,
                'name' => 'Meropenem',
            ),
            45 => 
            array (
                'id' => 47,
                'name' => 'Metronidazole',
            ),
            46 => 
            array (
                'id' => 48,
                'name' => 'Mezlocillin',
            ),
            47 => 
            array (
                'id' => 49,
                'name' => 'Minocycline',
            ),
            48 => 
            array (
                'id' => 50,
                'name' => 'Moxalactam',
            ),
            49 => 
            array (
                'id' => 51,
                'name' => 'Moxifloxacin',
            ),
            50 => 
            array (
                'id' => 52,
                'name' => 'Mupirocin',
            ),
            51 => 
            array (
                'id' => 53,
                'name' => 'Nalidixic Acid',
            ),
            52 => 
            array (
                'id' => 54,
                'name' => 'Neomycin',
            ),
            53 => 
            array (
                'id' => 55,
                'name' => 'Netilmicin',
            ),
            54 => 
            array (
                'id' => 56,
                'name' => 'Nitrofurantoin',
            ),
            55 => 
            array (
                'id' => 57,
                'name' => 'Nitroxolin',
            ),
            56 => 
            array (
                'id' => 58,
                'name' => 'Norfloxacin',
            ),
            57 => 
            array (
                'id' => 59,
                'name' => 'Ofloxacin',
            ),
            58 => 
            array (
                'id' => 60,
                'name' => 'Oxacillin',
            ),
            59 => 
            array (
                'id' => 61,
                'name' => 'Oxolinic Acid',
            ),
            60 => 
            array (
                'id' => 62,
                'name' => 'Pefloxacin ',
            ),
            61 => 
            array (
                'id' => 63,
                'name' => 'Penicillin',
            ),
            62 => 
            array (
                'id' => 64,
                'name' => 'Pipemidic Acid',
            ),
            63 => 
            array (
                'id' => 65,
                'name' => 'Piperacillin',
            ),
            64 => 
            array (
                'id' => 66,
                'name' => 'Polymixin',
            ),
            65 => 
            array (
                'id' => 67,
                'name' => 'Pristinamycin',
            ),
            66 => 
            array (
                'id' => 68,
                'name' => 'Quinupristin-Dalfopristin',
            ),
            67 => 
            array (
                'id' => 69,
                'name' => 'Rifampicin',
            ),
            68 => 
            array (
                'id' => 70,
                'name' => 'Sparfloxacin',
            ),
            69 => 
            array (
                'id' => 71,
                'name' => 'Spectinomycin',
            ),
            70 => 
            array (
                'id' => 72,
                'name' => 'Spiramycin',
            ),
            71 => 
            array (
                'id' => 73,
                'name' => 'Streptomycin',
            ),
            72 => 
            array (
                'id' => 74,
                'name' => 'Sulfonamides',
            ),
            73 => 
            array (
                'id' => 75,
                'name' => 'Teicoplanin',
            ),
            74 => 
            array (
                'id' => 76,
                'name' => 'Telithromycin',
            ),
            75 => 
            array (
                'id' => 77,
                'name' => 'Tetracycline',
            ),
            76 => 
            array (
                'id' => 78,
                'name' => 'Ticarcillin',
            ),
            77 => 
            array (
                'id' => 79,
                'name' => 'Tigecycline',
            ),
            78 => 
            array (
                'id' => 80,
                'name' => 'Tobramycin',
            ),
            79 => 
            array (
                'id' => 81,
                'name' => 'Trimethoprim',
            ),
            80 => 
            array (
                'id' => 82,
                'name' => 'Vancomycin',
            ),
            81 => 
            array (
                'id' => 83,
                'name' => 'cloxacillin',
            ),
            82 => 
            array (
                'id' => 84,
                'name' => 'cephalexin',
            ),
        ));
        
        
    }
}