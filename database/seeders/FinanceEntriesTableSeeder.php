<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinanceEntriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('finance_entries')->delete();
        
        \DB::table('finance_entries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => 'ايداع 30000 للمصرف كراس مال',
                'transfer' => 0,
                'created_at' => '2024-09-03 02:13:34',
                'updated_at' => '2024-09-03 02:13:34',
            ),
            1 => 
            array (
                'id' => 2,
                'description' => 'ايداع 10000 للخزينه كراس مال',
                'transfer' => 0,
                'created_at' => '2024-09-03 02:14:18',
                'updated_at' => '2024-09-03 02:14:18',
            ),
            2 => 
            array (
                'id' => 3,
                'description' => 'شرا  سياره بصك',
                'transfer' => 0,
                'created_at' => '2024-09-03 02:18:21',
                'updated_at' => '2024-09-03 02:18:21',
            ),
            3 => 
            array (
                'id' => 4,
                'description' => 'شرا بضاعه',
                'transfer' => 0,
                'created_at' => '2024-09-03 02:20:06',
                'updated_at' => '2024-09-03 02:20:06',
            ),
            4 => 
            array (
                'id' => 5,
                'description' => 'شراا ملابس لصاحب المشروع',
                'transfer' => 0,
                'created_at' => '2024-09-03 02:23:55',
                'updated_at' => '2024-09-03 02:23:55',
            ),
            5 => 
            array (
                'id' => 6,
                'description' => 'شراء بضاعه  م ن شركه الاهليه نقدا',
                'transfer' => 0,
                'created_at' => '2024-09-03 02:25:21',
                'updated_at' => '2024-09-03 02:25:21',
            ),
            6 => 
            array (
                'id' => 7,
                'description' => 'بيع بضاعه علي الحساب لشركه الكمال',
                'transfer' => 0,
                'created_at' => '2024-09-03 02:29:49',
                'updated_at' => '2024-09-03 02:29:49',
            ),
            7 => 
            array (
                'id' => 8,
                'description' => 'بيع احدي السيارات',
                'transfer' => 0,
                'created_at' => '2024-09-03 02:30:42',
                'updated_at' => '2024-09-03 02:30:42',
            ),
            8 => 
            array (
                'id' => 9,
                'description' => 'تسديدات بقيمه 1000 لشركه الاهليه',
                'transfer' => 0,
                'created_at' => '2024-09-03 02:35:07',
                'updated_at' => '2024-09-03 02:35:07',
            ),
        ));
        
        
    }
}