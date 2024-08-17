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
                'name' => 'السندويتشات',
                'image_base_64' => '',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'بيرغر',
                'image_base_64' => '',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'كرسبي',
                'image_base_64' => '',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'اقاشي',
                'image_base_64' => '',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'الكريب',
                'image_base_64' => '',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'بيتزا',
                'image_base_64' => '',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'الفطائر',
                'image_base_64' => '',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'الفطائر الحلوه',
                'image_base_64' => '',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'المشويات',
                'image_base_64' => '',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'عصائر',
                'image_base_64' => '',
            ),
        ));
        
        
    }
}