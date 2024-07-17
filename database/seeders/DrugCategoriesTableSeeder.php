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

            1 =>
            array (
                'id' => 1,
                'name' => 'Cushions',
            ),
            2 =>
            array (
                'id' => 2,
                'name' => 'Accessories',
            ),
            3 =>
            array (
                'id' => 3,
                'name' => 'Rugs',
            ),
            4 =>
            array (
                'id' => 4,
                'name' => 'Vases',
            ),
            5 =>
            array (
                'id' => 5,
                'name' => 'Dray plants',
            ),
            6 =>
            array (
                'id' => 6,
                'name' => 'Baskets',
            ),
            7 =>
            array (
                'id' => 7,
                'name' => 'Pendant lights',
            ),
        ));


    }
}
