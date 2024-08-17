<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AccountCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('account_categories')->delete();
        
        \DB::table('account_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'الاصول',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'حقوق الملكيه',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'الالتزامات',
            ),
        ));
        
        
    }
}