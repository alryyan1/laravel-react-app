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
                'created_at' => '2024-08-14 17:30:18',
                'updated_at' => '2024-08-14 17:30:18',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'البنك',
                'account_category_id' => 1,
                'debit' => 0,
                'created_at' => '2024-08-14 17:37:03',
                'updated_at' => '2024-08-14 17:37:03',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'مباني',
                'account_category_id' => 1,
                'debit' => 0,
                'created_at' => '2024-08-14 17:37:49',
                'updated_at' => '2024-08-14 17:37:49',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'راس المال',
                'account_category_id' => 2,
                'debit' => 1,
                'created_at' => '2024-08-14 17:38:06',
                'updated_at' => '2024-08-14 17:38:06',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'الايرادات',
                'account_category_id' => 2,
                'debit' => 1,
                'created_at' => '2024-08-14 17:57:04',
                'updated_at' => '2024-08-14 17:57:04',
            ),
            5 => 
            array (
                'id' => 6,
            'name' => 'البضاعه(المخزن)',
                'account_category_id' => 1,
                'debit' => 0,
                'created_at' => '2024-08-14 17:57:32',
                'updated_at' => '2024-08-14 17:57:32',
            ),
        ));
        
        
    }
}