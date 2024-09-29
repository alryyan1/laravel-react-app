<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PharmacyTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pharmacy_types')->delete();
        
        \DB::table('pharmacy_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'حبوب',
                'created_at' => '2024-07-22 23:25:26',
                'updated_at' => '2024-07-22 23:25:26',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'LOTION',
                'created_at' => '2024-07-28 14:38:11',
                'updated_at' => '2024-07-28 14:38:11',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'DROP',
                'created_at' => '2024-07-28 14:48:59',
                'updated_at' => '2024-07-28 14:48:59',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'EFFERVESCENT',
                'created_at' => '2024-07-28 14:57:52',
                'updated_at' => '2024-07-28 14:57:52',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'TABLET',
                'created_at' => '2024-07-28 15:11:31',
                'updated_at' => '2024-07-28 15:11:31',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'TOPICAL SOLUTION',
                'created_at' => '2024-07-29 16:30:50',
                'updated_at' => '2024-07-29 16:30:50',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'CREAM',
                'created_at' => '2024-07-30 16:43:25',
                'updated_at' => '2024-07-30 16:43:25',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'syrup',
                'created_at' => '2024-07-30 17:16:00',
                'updated_at' => '2024-07-30 17:16:00',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'liquid',
                'created_at' => '2024-08-05 16:59:13',
                'updated_at' => '2024-08-05 16:59:13',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'shampoo',
                'created_at' => '2024-08-05 21:47:25',
                'updated_at' => '2024-08-05 21:47:25',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'FACE WASH',
                'created_at' => '2024-08-20 00:36:09',
                'updated_at' => '2024-08-20 00:36:09',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'SERUM',
                'created_at' => '2024-08-20 00:38:33',
                'updated_at' => '2024-08-20 00:38:33',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'CAPSULES',
                'created_at' => '2024-08-24 21:57:28',
                'updated_at' => '2024-08-24 21:57:28',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'CONDITIONER',
                'created_at' => '2024-08-25 01:23:13',
                'updated_at' => '2024-08-25 01:23:13',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'cleanser',
                'created_at' => '2024-08-28 21:41:47',
                'updated_at' => '2024-08-28 21:41:47',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'toner',
                'created_at' => '2024-08-28 21:58:25',
                'updated_at' => '2024-08-28 21:58:25',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'micellar water',
                'created_at' => '2024-08-28 22:07:25',
                'updated_at' => '2024-08-28 22:07:25',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'deodorent',
                'created_at' => '2024-08-28 23:44:52',
                'updated_at' => '2024-08-28 23:44:52',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'deodorant',
                'created_at' => '2024-08-28 23:45:36',
                'updated_at' => '2024-08-28 23:45:36',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'moisturiser',
                'created_at' => '2024-08-29 01:13:44',
                'updated_at' => '2024-08-29 01:13:44',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'powder',
                'created_at' => '2024-08-31 21:30:29',
                'updated_at' => '2024-08-31 21:30:29',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'milk formula',
                'created_at' => '2024-09-01 23:13:06',
                'updated_at' => '2024-09-01 23:13:06',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'DEVICE',
                'created_at' => '2024-09-02 22:02:24',
                'updated_at' => '2024-09-02 22:02:24',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'TOOTH PASTE',
                'created_at' => '2024-09-02 22:54:31',
                'updated_at' => '2024-09-02 22:54:31',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'SPARY',
                'created_at' => '2024-09-03 00:05:09',
                'updated_at' => '2024-09-03 00:05:09',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'CAPLETS',
                'created_at' => '2024-09-03 00:09:21',
                'updated_at' => '2024-09-03 00:09:21',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'NEBULIZER',
                'created_at' => '2024-09-04 00:51:09',
                'updated_at' => '2024-09-04 00:51:09',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'FASCIAL DEVICE',
                'created_at' => '2024-09-04 00:56:51',
                'updated_at' => '2024-09-04 00:56:51',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'SOAP',
                'created_at' => '2024-09-09 03:10:12',
                'updated_at' => '2024-09-09 03:10:12',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'WIPES',
                'created_at' => '2024-09-09 03:16:40',
                'updated_at' => '2024-09-09 03:16:40',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'fluid',
                'created_at' => '2024-09-09 16:43:21',
                'updated_at' => '2024-09-09 16:43:21',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'eye mask',
                'created_at' => '2024-09-09 17:13:55',
                'updated_at' => '2024-09-09 17:13:55',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'face mask',
                'created_at' => '2024-09-09 17:16:26',
                'updated_at' => '2024-09-09 17:16:26',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'sun block',
                'created_at' => '2024-09-09 23:48:20',
                'updated_at' => '2024-09-09 23:48:20',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'lip palm',
                'created_at' => '2024-09-09 23:52:00',
                'updated_at' => '2024-09-09 23:52:00',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'intimate wash',
                'created_at' => '2024-09-10 00:22:46',
                'updated_at' => '2024-09-10 00:22:46',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'shower gel',
                'created_at' => '2024-09-10 00:54:17',
                'updated_at' => '2024-09-10 00:54:17',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'nose spray',
                'created_at' => '2024-09-11 03:43:09',
                'updated_at' => '2024-09-11 03:43:09',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'lip balm',
                'created_at' => '2024-09-11 22:18:55',
                'updated_at' => '2024-09-11 22:18:55',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'OIL',
                'created_at' => '2024-09-11 23:21:10',
                'updated_at' => '2024-09-11 23:21:10',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'INSULIN PEN',
                'created_at' => '2024-09-12 23:40:09',
                'updated_at' => '2024-09-12 23:40:09',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'INJECTION',
                'created_at' => '2024-09-12 23:46:32',
                'updated_at' => '2024-09-12 23:46:32',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'GEL',
                'created_at' => '2024-09-13 00:06:02',
                'updated_at' => '2024-09-13 00:06:02',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'FOOD',
                'created_at' => '2024-09-13 00:13:32',
                'updated_at' => '2024-09-13 00:13:32',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'HAIR MASK',
                'created_at' => '2024-09-13 00:28:11',
                'updated_at' => '2024-09-13 00:28:11',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'glass bottel',
                'created_at' => '2024-09-14 17:34:18',
                'updated_at' => '2024-09-14 17:34:18',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'SCRUB',
                'created_at' => '2024-09-15 00:42:37',
                'updated_at' => '2024-09-15 00:42:37',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'HONEY',
                'created_at' => '2024-09-15 00:44:59',
                'updated_at' => '2024-09-15 00:44:59',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'VASILINE',
                'created_at' => '2024-09-15 00:47:14',
                'updated_at' => '2024-09-15 00:47:14',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'NAIL POLISH REMOVER',
                'created_at' => '2024-09-15 02:42:28',
                'updated_at' => '2024-09-15 02:42:28',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'ROSE WATER',
                'created_at' => '2024-09-15 02:50:15',
                'updated_at' => '2024-09-15 02:50:15',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'BODY SPRAY',
                'created_at' => '2024-09-16 00:14:21',
                'updated_at' => '2024-09-16 00:14:21',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'COLORING CREAM',
                'created_at' => '2024-09-16 00:43:06',
                'updated_at' => '2024-09-16 00:43:06',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'HAIR DYE',
                'created_at' => '2024-09-16 01:25:05',
                'updated_at' => '2024-09-16 01:25:05',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'HAIR SERUM',
                'created_at' => '2024-09-16 01:32:24',
                'updated_at' => '2024-09-16 01:32:24',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'HAIR TONIC',
                'created_at' => '2024-09-16 01:35:27',
                'updated_at' => '2024-09-16 01:35:27',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'HAIR SPRAY',
                'created_at' => '2024-09-16 01:37:38',
                'updated_at' => '2024-09-16 01:37:38',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'drops',
                'created_at' => '2024-09-17 01:18:12',
                'updated_at' => '2024-09-17 01:18:12',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'suspension',
                'created_at' => '2024-09-17 16:16:22',
                'updated_at' => '2024-09-17 16:16:22',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'CANDY',
                'created_at' => '2024-09-17 23:40:19',
                'updated_at' => '2024-09-17 23:40:19',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'HAIR WAX',
                'created_at' => '2024-09-18 23:31:50',
                'updated_at' => '2024-09-18 23:31:50',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'THERMOMETER',
                'created_at' => '2024-09-18 23:34:38',
                'updated_at' => '2024-09-18 23:34:38',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'HAIR SOLUTION',
                'created_at' => '2024-09-18 23:46:06',
                'updated_at' => '2024-09-18 23:46:06',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'HAIR PROTECTOR',
                'created_at' => '2024-09-19 01:09:34',
                'updated_at' => '2024-09-19 01:09:34',
            ),
        ));
        
        
    }
}