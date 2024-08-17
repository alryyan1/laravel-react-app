<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserRoutesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_routes')->delete();
        
        \DB::table('user_routes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'route_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'route_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'route_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'route_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'route_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 1,
                'route_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 1,
                'route_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 1,
                'route_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 1,
                'route_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}