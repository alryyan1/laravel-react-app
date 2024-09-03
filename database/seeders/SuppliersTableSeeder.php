<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suppliers')->delete();
        
        \DB::table('suppliers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'مخزون افتتاحي',
                'phone' => '0',
                'address' => '',
                'email' => '',
                'created_at' => '2024-09-03 12:16:47',
                'updated_at' => '2024-09-03 12:38:21',
            ),
        ));
        
        
    }
}