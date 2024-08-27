<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clients')->delete();
        
        \DB::table('clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'اروي',
                'phone' => '92965422',
                'address' => 'المضي',
                'email' => NULL,
                'country_id' => 1,
                'state' => 'مسقط',
                'created_at' => '2024-08-27 11:59:16',
                'updated_at' => '2024-08-27 11:59:16',
                'clinic_name' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'احمد',
                'phone' => '99484986',
                'address' => 'سمائل',
                'email' => NULL,
                'country_id' => 1,
                'state' => 'مسقط',
                'created_at' => '2024-08-27 12:08:37',
                'updated_at' => '2024-08-27 12:08:37',
                'clinic_name' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'موسي',
                'phone' => '96138162',
                'address' => 'العامرات',
                'email' => NULL,
                'country_id' => 1,
                'state' => 'مسقط',
                'created_at' => '2024-08-27 12:09:49',
                'updated_at' => '2024-08-27 12:09:49',
                'clinic_name' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'عبير',
                'phone' => '95047029',
                'address' => 'شناص',
                'email' => NULL,
                'country_id' => 1,
                'state' => 'مسقط',
                'created_at' => '2024-08-27 12:11:24',
                'updated_at' => '2024-08-27 12:11:24',
                'clinic_name' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'الزهراء',
                'phone' => '91489379',
                'address' => 'قريات',
                'email' => NULL,
                'country_id' => 1,
                'state' => 'مسقط',
                'created_at' => '2024-08-27 12:12:05',
                'updated_at' => '2024-08-27 12:12:05',
                'clinic_name' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'عبدالله',
                'phone' => '99847158',
                'address' => 'القرم',
                'email' => NULL,
                'country_id' => 1,
                'state' => 'مسقط',
                'created_at' => '2024-08-27 12:17:59',
                'updated_at' => '2024-08-27 12:17:59',
                'clinic_name' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'هيثم',
                'phone' => '95947753',
                'address' => 'لوي',
                'email' => NULL,
                'country_id' => 1,
                'state' => 'مسقط',
                'created_at' => '2024-08-27 13:17:18',
                'updated_at' => '2024-08-27 13:17:18',
                'clinic_name' => NULL,
            ),
        ));
        
        
    }
}