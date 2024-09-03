<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreditEntriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('credit_entries')->delete();
        
        \DB::table('credit_entries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'finance_account_id' => 4,
                'finance_entry_id' => 1,
                'amount' => 30000.0,
                'created_at' => '2024-09-03 02:13:34',
                'updated_at' => '2024-09-03 02:13:34',
            ),
            1 => 
            array (
                'id' => 2,
                'finance_account_id' => 4,
                'finance_entry_id' => 2,
                'amount' => 10000.0,
                'created_at' => '2024-09-03 02:14:18',
                'updated_at' => '2024-09-03 02:14:18',
            ),
            2 => 
            array (
                'id' => 3,
                'finance_account_id' => 2,
                'finance_entry_id' => 3,
                'amount' => 20000.0,
                'created_at' => '2024-09-03 02:18:21',
                'updated_at' => '2024-09-03 02:18:21',
            ),
            3 => 
            array (
                'id' => 4,
                'finance_account_id' => 1,
                'finance_entry_id' => 4,
                'amount' => 5000.0,
                'created_at' => '2024-09-03 02:20:06',
                'updated_at' => '2024-09-03 02:20:06',
            ),
            4 => 
            array (
                'id' => 5,
                'finance_account_id' => 1,
                'finance_entry_id' => 5,
                'amount' => 200.0,
                'created_at' => '2024-09-03 02:23:55',
                'updated_at' => '2024-09-03 02:23:55',
            ),
            5 => 
            array (
                'id' => 6,
                'finance_account_id' => 13,
                'finance_entry_id' => 6,
                'amount' => 2000.0,
                'created_at' => '2024-09-03 02:25:21',
                'updated_at' => '2024-09-03 02:25:21',
            ),
            6 => 
            array (
                'id' => 7,
                'finance_account_id' => 8,
                'finance_entry_id' => 7,
                'amount' => 3000.0,
                'created_at' => '2024-09-03 02:29:49',
                'updated_at' => '2024-09-03 02:29:49',
            ),
            7 => 
            array (
                'id' => 8,
                'finance_account_id' => 14,
                'finance_entry_id' => 8,
                'amount' => 2000.0,
                'created_at' => '2024-09-03 02:30:42',
                'updated_at' => '2024-09-03 02:30:42',
            ),
            8 => 
            array (
                'id' => 9,
                'finance_account_id' => 2,
                'finance_entry_id' => 9,
                'amount' => 1000.0,
                'created_at' => '2024-09-03 02:35:07',
                'updated_at' => '2024-09-03 02:35:07',
            ),
        ));
        
        
    }
}