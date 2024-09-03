<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinanceAccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('finance_accounts')->delete();
        
        \DB::table('finance_accounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'الخزينه',
                'account_category_id' => 1,
                'debit' => 0,
                'description' => NULL,
                'created_at' => '2024-08-14 17:30:18',
                'updated_at' => '2024-08-14 17:30:18',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'البنك',
                'account_category_id' => 1,
                'debit' => 0,
                'description' => NULL,
                'created_at' => '2024-08-14 17:37:03',
                'updated_at' => '2024-08-14 17:37:03',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'مباني',
                'account_category_id' => 1,
                'debit' => 0,
                'description' => NULL,
                'created_at' => '2024-08-14 17:37:49',
                'updated_at' => '2024-08-14 17:37:49',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'راس المال',
                'account_category_id' => 2,
                'debit' => 1,
                'description' => NULL,
                'created_at' => '2024-08-14 17:38:06',
                'updated_at' => '2024-08-14 17:38:06',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'الايرادات',
                'account_category_id' => 2,
                'debit' => 1,
                'description' => NULL,
                'created_at' => '2024-08-14 17:57:04',
                'updated_at' => '2024-08-14 17:57:04',
            ),
            5 => 
            array (
                'id' => 6,
            'name' => 'البضاعه(المخزن)',
                'account_category_id' => 1,
                'debit' => 0,
                'description' => NULL,
                'created_at' => '2024-08-14 17:57:32',
                'updated_at' => '2024-08-14 17:57:32',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'المشتريات',
                'account_category_id' => 1,
                'debit' => 0,
                'description' => NULL,
                'created_at' => '2024-09-03 01:57:00',
                'updated_at' => '2024-09-03 01:57:00',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'المبيعات',
                'account_category_id' => 2,
                'debit' => 1,
                'description' => NULL,
                'created_at' => '2024-09-03 01:57:13',
                'updated_at' => '2024-09-03 01:57:13',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'مردودات ومسموحات المشتريات',
                'account_category_id' => 2,
                'debit' => 1,
                'description' => NULL,
                'created_at' => '2024-09-03 01:58:23',
                'updated_at' => '2024-09-03 01:58:23',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'مردودات ومسموحات المبيعات',
                'account_category_id' => 1,
                'debit' => 0,
                'description' => NULL,
                'created_at' => '2024-09-03 01:58:45',
                'updated_at' => '2024-09-03 01:58:45',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'مصروف نقل مشتريات',
                'account_category_id' => 2,
                'debit' => 0,
                'description' => NULL,
                'created_at' => '2024-09-03 02:01:35',
                'updated_at' => '2024-09-03 02:01:35',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'مصروف نقل مبيعات',
                'account_category_id' => 1,
                'debit' => 0,
                'description' => NULL,
                'created_at' => '2024-09-03 02:01:57',
                'updated_at' => '2024-09-03 02:01:57',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'الدائنين',
                'account_category_id' => 3,
                'debit' => 1,
                'description' => NULL,
                'created_at' => '2024-09-03 02:04:40',
                'updated_at' => '2024-09-03 02:04:40',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'السيارات',
                'account_category_id' => 1,
                'debit' => 0,
                'description' => NULL,
                'created_at' => '2024-09-03 02:17:50',
                'updated_at' => '2024-09-03 02:17:50',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'المسحوبات',
                'account_category_id' => 2,
                'debit' => 0,
                'description' => NULL,
                'created_at' => '2024-09-03 02:23:10',
                'updated_at' => '2024-09-03 02:23:10',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'المدينين',
                'account_category_id' => 1,
                'debit' => 0,
                'description' => NULL,
                'created_at' => '2024-09-03 17:27:59',
                'updated_at' => '2024-09-03 17:27:59',
            ),
        ));
        
        
    }
}