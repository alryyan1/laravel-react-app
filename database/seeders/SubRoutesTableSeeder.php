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
                'name' => 'quantity',
                'path' => '/pharmacy/inventory',
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
            ),
            7 =>
            array (
                'id' => 8,
                'route_id' => 5,
                'name' => 'booking',
                'path' => '/clinic',
            ),
            8 =>
            array (
                'id' => 9,
                'route_id' => 5,
                'name' => 'doctor_reclaim',
                'path' => '/clinic/doctors',
            ),
            9 =>
            array (
                'id' => 10,
                'route_id' => 5,
                'name' => 'cash_count',
                'path' => 'clinic/denos',
            ),
            10 =>
            array (
                'id' => 11,
                'route_id' => 4,
                'name' => 'register_lab_patient',
                'path' => 'laboratory/add',
            ),
            11 =>
            array (
                'id' => 12,
                'route_id' => 4,
                'name' => 'result_entry',
                'path' => 'laboratory/result',
            ),
            12 =>
            array (
                'id' => 13,
                'route_id' => 4,
                'name' => 'sample_collection',
                'path' => 'laboratory/sample',
            ),
            13 =>
            array (
                'id' => 14,
                'route_id' => 4,
                'name' => 'test_management',
                'path' => 'laboratory/tests',
            ),
            14 =>
            array (
                'id' => 15,
                'route_id' => 4,
                'name' => 'price_list',
                'path' => 'laboratory/price',
            ),
            15 =>
            array (
                'id' => 16,
                'route_id' => 4,
                'name' => 'CBC LIS',
                'path' => 'laboratory/cbc-lis',
            ),
            16 =>
            array (
                'id' => 17,
                'route_id' => 4,
                'name' => 'Chemistry LIS',
                'path' => 'laboratory/chemistry-lis',
            ),
        ));


    }
}
