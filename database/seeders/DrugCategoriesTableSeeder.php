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
                'name' => 'الجهاز ',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'اسنان',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'تجميل',
            ),
        ));
        
        
    }
}