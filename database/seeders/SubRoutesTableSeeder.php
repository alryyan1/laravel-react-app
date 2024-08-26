<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubRoutesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sub_routes')->delete();

        \DB::table('sub_routes')->insert(array (
            0 =>
            array (
                'id' => 1,
                'route_id' => 2,
                'name' => 'define',
                'path' => '/pharmacy/add',
            ),
            1 =>
            array (
                'id' => 2,
                'route_id' => 2,
                'name' => 'pos',
                'path' => '/pharmacy/sell',
            ),
            2 =>
            array (
                'id' => 3,
                'route_id' => 2,
                'name' => 'items',
                'path' => '/pharmacy/items',
            ),
            3 =>
            array (
                'id' => 4,
                'route_id' => 2,
                'name' => 'sales',
                'path' => '/pharmacy/reports',
            ),
            4 =>
            array (
                'id' => 5,
                'route_id' => 2,
                'name' => 'quantities',
                'path' => '/pharmacy/quantities',
            ),
            5 =>
            array (
                'id' => 6,
                'route_id' => 2,
                'name' => 'income',
                'path' => '/pharmacy/deposit',
            ),
            6 =>
            array (
                'id' => 7,
                'route_id' => 2,
                'name' => 'expenses',
                'path' => '/clinic/denos',
            )
        ));


    }
}
