<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'تذكره اخصائي',
                'service_group_id' => 1,
                'price' => 12000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:43:04',
                'updated_at' => '2024-05-15 20:43:04',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'عمومي',
                'service_group_id' => 1,
                'price' => 5000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:43:04',
                'updated_at' => '2024-05-15 20:43:04',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'تذكره اخصائي',
                'service_group_id' => 1,
                'price' => 12000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'عمومي',
                'service_group_id' => 1,
                'price' => 5000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            4 => 
            array (
                'id' => 7,
                'name' => 'غيار كبير',
                'service_group_id' => 8,
                'price' => 20000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'غيار متوسط',
                'service_group_id' => 8,
                'price' => 15000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'غيار صغير',
                'service_group_id' => 8,
                'price' => 10000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            7 => 
            array (
                'id' => 10,
                'name' => 'غيار جاف',
                'service_group_id' => 8,
                'price' => 5000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            8 => 
            array (
                'id' => 11,
                'name' => 'غيار جرح سكري',
                'service_group_id' => 8,
                'price' => 7000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            9 => 
            array (
                'id' => 12,
                'name' => 'فتح خراج',
                'service_group_id' => 8,
                'price' => 32000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            10 => 
            array (
                'id' => 13,
                'name' => 'فتح خراج متوسط',
                'service_group_id' => 8,
                'price' => 15000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            11 => 
            array (
                'id' => 14,
                'name' => 'ازاله عين سمكه',
                'service_group_id' => 8,
                'price' => 15000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            12 => 
            array (
                'id' => 15,
                'name' => 'ازاله كيس دهني',
                'service_group_id' => 8,
                'price' => 25000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            13 => 
            array (
                'id' => 16,
                'name' => 'ازاله خيط',
                'service_group_id' => 8,
                'price' => 3000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            14 => 
            array (
                'id' => 17,
                'name' => 'ازاله سلك',
                'service_group_id' => 8,
                'price' => 5000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            15 => 
            array (
                'id' => 18,
                'name' => 'ازاله درين عمليه',
                'service_group_id' => 8,
                'price' => 4000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            16 => 
            array (
                'id' => 19,
                'name' => 'علاج بالاكسجين',
                'service_group_id' => 2,
                'price' => 2000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            17 => 
            array (
                'id' => 20,
                'name' => 'جلسه فانتولين',
                'service_group_id' => 2,
                'price' => 6000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            18 => 
            array (
                'id' => 21,
                'name' => 'جبص صغير او متوسط',
                'service_group_id' => 8,
                'price' => 5000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            19 => 
            array (
                'id' => 22,
                'name' => 'حقنه في المفصل',
                'service_group_id' => 9,
                'price' => 12000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            20 => 
            array (
                'id' => 23,
                'name' => 'تركيب قسطره اخصائي',
                'service_group_id' => 9,
                'price' => 10000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            21 => 
            array (
                'id' => 24,
                'name' => 'تركيب قسطره بواسطه الممرض',
                'service_group_id' => 2,
                'price' => 5000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            22 => 
            array (
                'id' => 25,
                'name' => 'حقنه',
                'service_group_id' => 2,
                'price' => 1000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            23 => 
            array (
                'id' => 26,
                'name' => 'اقامه ساعه',
                'service_group_id' => 2,
                'price' => 1500.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            24 => 
            array (
                'id' => 27,
                'name' => 'قياس ضغط',
                'service_group_id' => 2,
                'price' => 1000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            25 => 
            array (
                'id' => 28,
                'name' => 'فحص سكري بالجهاز',
                'service_group_id' => 2,
                'price' => 1000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            26 => 
            array (
                'id' => 29,
                'name' => 'غسيل معده ',
                'service_group_id' => 2,
                'price' => 0.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            27 => 
            array (
                'id' => 30,
                'name' => 'خياطه غرزه',
                'service_group_id' => 8,
                'price' => 39000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            28 => 
            array (
                'id' => 31,
                'name' => 'ازاله غرزه',
                'service_group_id' => 8,
                'price' => 500.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            29 => 
            array (
                'id' => 32,
                'name' => 'ازاله قسطره بوليه',
                'service_group_id' => 8,
                'price' => 3000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            30 => 
            array (
                'id' => 33,
                'name' => 'تركيب انوبه قصبه هوائيه',
                'service_group_id' => 2,
                'price' => 0.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            31 => 
            array (
                'id' => 34,
                'name' => 'تركيب انوبه معده',
                'service_group_id' => 2,
                'price' => 10000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            32 => 
            array (
                'id' => 35,
                'name' => 'ازاله انوبه معده',
                'service_group_id' => 2,
                'price' => 3000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            33 => 
            array (
                'id' => 36,
                'name' => 'ازاله جبص باليد ',
                'service_group_id' => 8,
                'price' => 4000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            34 => 
            array (
                'id' => 37,
                'name' => 'ازاله جبص بالرجل',
                'service_group_id' => 8,
                'price' => 6000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            35 => 
            array (
                'id' => 38,
                'name' => 'خياطه تجميليه',
                'service_group_id' => 8,
                'price' => 0.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            36 => 
            array (
                'id' => 39,
                'name' => 'تركيب فراشه',
                'service_group_id' => 2,
                'price' => 1500.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            37 => 
            array (
                'id' => 40,
                'name' => 'غسيل الازن وازاله شمع',
                'service_group_id' => 9,
                'price' => 0.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            38 => 
            array (
                'id' => 41,
                'name' => 'ازاله  جسم غريب من الازن او الانف',
                'service_group_id' => 9,
                'price' => 0.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            39 => 
            array (
                'id' => 42,
                'name' => 'عمليه تحت البنج الموضعي  اخصائي',
                'service_group_id' => 9,
                'price' => 30000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            40 => 
            array (
                'id' => 43,
                'name' => 'عمليه تحت البنج الموضعي عمومي',
                'service_group_id' => 1,
                'price' => 15000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            41 => 
            array (
                'id' => 44,
                'name' => 'PNS',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            42 => 
            array (
                'id' => 45,
                'name' => 'KUB',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:05',
                'updated_at' => '2024-05-15 20:46:05',
            ),
            43 => 
            array (
                'id' => 46,
                'name' => 'CHEST',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            44 => 
            array (
                'id' => 47,
                'name' => 'Sellaturcica',
                'service_group_id' => 1,
                'price' => 8000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            45 => 
            array (
                'id' => 48,
                'name' => 'Sternum',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            46 => 
            array (
                'id' => 49,
                'name' => 'Mastoid bone ',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            47 => 
            array (
                'id' => 50,
                'name' => 'x - ray',
                'service_group_id' => 4,
                'price' => 10000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            48 => 
            array (
                'id' => 51,
                'name' => 'Orbit',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            49 => 
            array (
                'id' => 52,
            'name' => 'Humerus (arm)',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            50 => 
            array (
                'id' => 53,
                'name' => 'Hand',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            51 => 
            array (
                'id' => 54,
                'name' => 'Wrist',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            52 => 
            array (
                'id' => 55,
                'name' => 'Forearm',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            53 => 
            array (
                'id' => 56,
                'name' => 'Spine',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            54 => 
            array (
                'id' => 57,
                'name' => 'Nasal bone',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            55 => 
            array (
                'id' => 58,
                'name' => 'Knee',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            56 => 
            array (
                'id' => 59,
                'name' => 'Leg',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            57 => 
            array (
                'id' => 60,
                'name' => 'Heel',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            58 => 
            array (
                'id' => 61,
                'name' => 'ankle',
                'service_group_id' => 4,
                'price' => 7000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            59 => 
            array (
                'id' => 62,
                'name' => 'Foot',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            60 => 
            array (
                'id' => 63,
                'name' => 'Elbow',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            61 => 
            array (
                'id' => 64,
                'name' => 'Femur',
                'service_group_id' => 4,
                'price' => 14000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            62 => 
            array (
                'id' => 65,
                'name' => 'CT - Abdomen',
                'service_group_id' => 5,
                'price' => 75000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            63 => 
            array (
                'id' => 66,
                'name' => 'CT - Chest',
                'service_group_id' => 5,
                'price' => 70000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            64 => 
            array (
                'id' => 67,
                'name' => 'CT - P N S',
                'service_group_id' => 5,
                'price' => 65000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            65 => 
            array (
                'id' => 68,
                'name' => 'CT - L.Spine',
                'service_group_id' => 5,
                'price' => 65000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            66 => 
            array (
                'id' => 69,
                'name' => 'CT - D.Spine',
                'service_group_id' => 5,
                'price' => 65000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            67 => 
            array (
                'id' => 70,
                'name' => 'CT - Neck',
                'service_group_id' => 5,
                'price' => 70000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            68 => 
            array (
                'id' => 71,
                'name' => 'CT - Foot',
                'service_group_id' => 5,
                'price' => 65000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            69 => 
            array (
                'id' => 72,
                'name' => 'CT - Ankle',
                'service_group_id' => 5,
                'price' => 65000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            70 => 
            array (
                'id' => 73,
                'name' => 'CT - Leg',
                'service_group_id' => 5,
                'price' => 65000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            71 => 
            array (
                'id' => 74,
                'name' => 'CT - Orbit',
                'service_group_id' => 5,
                'price' => 65000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            72 => 
            array (
                'id' => 75,
                'name' => 'CT - Pelvis',
                'service_group_id' => 5,
                'price' => 60000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            73 => 
            array (
                'id' => 76,
                'name' => 'CT - Mastoid',
                'service_group_id' => 5,
                'price' => 60000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            74 => 
            array (
                'id' => 77,
                'name' => 'CT - limbs',
                'service_group_id' => 5,
                'price' => 65000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            75 => 
            array (
                'id' => 78,
                'name' => 'CT - Cartoid',
                'service_group_id' => 5,
                'price' => 55000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            76 => 
            array (
                'id' => 79,
                'name' => 'CT - hand',
                'service_group_id' => 5,
                'price' => 60000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            77 => 
            array (
                'id' => 80,
                'name' => 'CT - U',
                'service_group_id' => 5,
                'price' => 75000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            78 => 
            array (
                'id' => 81,
                'name' => 'CT - KUB',
                'service_group_id' => 5,
                'price' => 65000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            79 => 
            array (
                'id' => 82,
                'name' => 'CT - Jaw',
                'service_group_id' => 5,
                'price' => 65000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            80 => 
            array (
                'id' => 83,
                'name' => 'CT -  IAM',
                'service_group_id' => 5,
                'price' => 60000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            81 => 
            array (
                'id' => 84,
                'name' => 'Doppler SingleVenous',
                'service_group_id' => 3,
                'price' => 15000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            82 => 
            array (
                'id' => 85,
                'name' => 'Doppler BothVenous',
                'service_group_id' => 3,
                'price' => 30000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            83 => 
            array (
                'id' => 86,
                'name' => ' Ultra Sound  abdomen',
                'service_group_id' => 3,
                'price' => 10000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            84 => 
            array (
                'id' => 87,
                'name' => 'Ultra Sound Obs',
                'service_group_id' => 3,
                'price' => 10000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            85 => 
            array (
                'id' => 88,
                'name' => 'ECG',
                'service_group_id' => 2,
                'price' => 5000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            86 => 
            array (
                'id' => 89,
                'name' => 'Echo',
                'service_group_id' => 2,
                'price' => 0.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            87 => 
            array (
                'id' => 90,
                'name' => 'CT- BRAIN',
                'service_group_id' => 5,
                'price' => 60000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            88 => 
            array (
                'id' => 91,
                'name' => 'CT CAP',
                'service_group_id' => 5,
                'price' => 125000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            89 => 
            array (
                'id' => 92,
                'name' => 'HRCT CHEST',
                'service_group_id' => 5,
                'price' => 65000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            90 => 
            array (
                'id' => 93,
                'name' => 'CT tmpral bone',
                'service_group_id' => 5,
                'price' => 65000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            91 => 
            array (
                'id' => 94,
                'name' => 'خبص القدم بواسطه اخصائى',
                'service_group_id' => 9,
                'price' => 15500.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            92 => 
            array (
                'id' => 95,
                'name' => 'جبص اليد بواسطه الاخصائي ',
                'service_group_id' => 9,
                'price' => 10000.0,
                'activate' => 0,
                'created_at' => '2024-05-15 20:46:06',
                'updated_at' => '2024-05-15 20:46:06',
            ),
            93 => 
            array (
                'id' => 96,
                'name' => 'حقنه مفصل بواسطه الاخصائي ( الحقنه من عند الدكتور ',
                    'service_group_id' => 9,
                    'price' => 15000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                94 => 
                array (
                    'id' => 97,
                'name' => 'حقنه مفصل بواسطه اخصائي ( الحقنه من عند المريض )',
                    'service_group_id' => 9,
                    'price' => 10000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                95 => 
                array (
                    'id' => 98,
                    'name' => 'تركيب شريحه بواسطه اخصائي ',
                    'service_group_id' => 9,
                    'price' => 15000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                96 => 
                array (
                    'id' => 99,
                    'name' => 'استخراج شريحه بواسطه اخصائي ',
                    'service_group_id' => 9,
                    'price' => 15000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                97 => 
                array (
                    'id' => 100,
                    'name' => 'جلسه كي كهربائي ',
                    'service_group_id' => 9,
                    'price' => 15000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                98 => 
                array (
                    'id' => 101,
                    'name' => 'جلسه ازاله نخل ',
                    'service_group_id' => 9,
                    'price' => 15000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                99 => 
                array (
                    'id' => 102,
                    'name' => 'جبص بواسطه الاخصائي',
                    'service_group_id' => 9,
                    'price' => 0.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                100 => 
                array (
                    'id' => 103,
                    'name' => 'تذكره 4000',
                    'service_group_id' => 1,
                    'price' => 4000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                101 => 
                array (
                    'id' => 104,
                    'name' => 'تذكره 5000',
                    'service_group_id' => 1,
                    'price' => 5000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                102 => 
                array (
                    'id' => 105,
                    'name' => 'pelvic',
                    'service_group_id' => 4,
                    'price' => 14000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                103 => 
                array (
                    'id' => 106,
                    'name' => 'hip joint',
                    'service_group_id' => 4,
                    'price' => 14000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                104 => 
                array (
                    'id' => 107,
                    'name' => 'shoulder',
                    'service_group_id' => 4,
                    'price' => 14000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                105 => 
                array (
                    'id' => 108,
                    'name' => 'scapula',
                    'service_group_id' => 4,
                    'price' => 14000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:06',
                    'updated_at' => '2024-05-15 20:46:06',
                ),
                106 => 
                array (
                    'id' => 109,
                    'name' => 'cervical',
                    'service_group_id' => 4,
                    'price' => 14000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                107 => 
                array (
                    'id' => 110,
                    'name' => 'lumbar',
                    'service_group_id' => 4,
                    'price' => 14000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                108 => 
                array (
                    'id' => 111,
                    'name' => 'sacrum',
                    'service_group_id' => 4,
                    'price' => 14000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                109 => 
                array (
                    'id' => 112,
                    'name' => 'thoracic',
                    'service_group_id' => 4,
                    'price' => 14000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                110 => 
                array (
                    'id' => 113,
                    'name' => 'درب',
                    'service_group_id' => 2,
                    'price' => 1000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                111 => 
                array (
                    'id' => 114,
                    'name' => 'اقامه طويله',
                    'service_group_id' => 2,
                    'price' => 4000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                112 => 
                array (
                    'id' => 115,
                    'name' => 'small part',
                    'service_group_id' => 3,
                    'price' => 12000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                113 => 
                array (
                    'id' => 116,
                    'name' => 'abdomen',
                    'service_group_id' => 4,
                    'price' => 14000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                114 => 
                array (
                    'id' => 117,
                    'name' => 'نحافة وتسمين',
                    'service_group_id' => 9,
                    'price' => 25000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                115 => 
                array (
                    'id' => 118,
                    'name' => 'CT SERVICAL',
                    'service_group_id' => 5,
                    'price' => 65000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                116 => 
                array (
                    'id' => 119,
                    'name' => 'Thyroid',
                    'service_group_id' => 3,
                    'price' => 12000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                117 => 
                array (
                    'id' => 120,
                    'name' => 'Breast',
                    'service_group_id' => 3,
                    'price' => 12000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                118 => 
                array (
                    'id' => 121,
                    'name' => 'Scrotum',
                    'service_group_id' => 3,
                    'price' => 12000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                119 => 
                array (
                    'id' => 122,
                    'name' => 'تذكره 9000',
                    'service_group_id' => 1,
                    'price' => 9000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                120 => 
                array (
                    'id' => 123,
                    'name' => 'ct thoracic spine',
                    'service_group_id' => 5,
                    'price' => 65000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                121 => 
                array (
                    'id' => 124,
                    'name' => 'Image ',
                    'service_group_id' => 5,
                    'price' => 15000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                122 => 
                array (
                    'id' => 125,
                    'name' => 'call',
                    'service_group_id' => 5,
                    'price' => 15000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                123 => 
                array (
                    'id' => 126,
                    'name' => 'نظافه جرح',
                    'service_group_id' => 2,
                    'price' => 3000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                124 => 
                array (
                    'id' => 127,
                    'name' => 'تذكره 12000',
                    'service_group_id' => 1,
                    'price' => 12000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                125 => 
                array (
                    'id' => 128,
                    'name' => 'عمليه صغيره',
                    'service_group_id' => 8,
                    'price' => 15000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                126 => 
                array (
                    'id' => 129,
                    'name' => 'حقنه شرجيه',
                    'service_group_id' => 2,
                    'price' => 2000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                127 => 
                array (
                    'id' => 130,
                    'name' => 'ختان',
                    'service_group_id' => 8,
                    'price' => 20000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                128 => 
                array (
                    'id' => 131,
                    'name' => 'ختان',
                    'service_group_id' => 9,
                    'price' => 20000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                129 => 
                array (
                    'id' => 132,
                    'name' => 'سحب سائل بلوري',
                    'service_group_id' => 9,
                    'price' => 30000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                130 => 
                array (
                    'id' => 133,
                    'name' => 'CT Elbow',
                    'service_group_id' => 5,
                    'price' => 60000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                131 => 
                array (
                    'id' => 134,
                    'name' => 'سحب ماء بالموجات الصوتيه',
                    'service_group_id' => 9,
                    'price' => 30000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                132 => 
                array (
                    'id' => 135,
                    'name' => 'اخصائي 2',
                    'service_group_id' => 9,
                    'price' => 10000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                133 => 
                array (
                    'id' => 136,
                    'name' => 'ازاله دبابيس',
                    'service_group_id' => 8,
                    'price' => 3000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                134 => 
                array (
                    'id' => 137,
                    'name' => 'فحص سكري بالجهاز',
                    'service_group_id' => 2,
                    'price' => 2000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                135 => 
                array (
                    'id' => 138,
                    'name' => 'CT - Knee',
                    'service_group_id' => 5,
                    'price' => 60000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
                136 => 
                array (
                    'id' => 139,
                    'name' => 'ماسك جديد',
                    'service_group_id' => 2,
                    'price' => 3000.0,
                    'activate' => 0,
                    'created_at' => '2024-05-15 20:46:07',
                    'updated_at' => '2024-05-15 20:46:07',
                ),
            ));
        
        
    }
}