<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'add items',
                'guard_name' => 'web',
                'created_at' => '2024-06-09 23:28:03',
                'updated_at' => '2024-06-09 23:55:27',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'edit items',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 12:22:08',
                'updated_at' => '2024-06-10 12:22:08',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'view items',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 12:23:04',
                'updated_at' => '2024-06-10 12:23:04',
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'delete items',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 12:26:02',
                'updated_at' => '2024-06-10 12:26:02',
            ),
            4 => 
            array (
                'id' => 7,
                'name' => 'انشاء فاتوره',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 18:19:25',
                'updated_at' => '2024-06-10 18:19:25',
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'التقارير',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 18:19:52',
                'updated_at' => '2024-06-10 18:19:52',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'اذن طلب',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 18:20:35',
                'updated_at' => '2024-06-10 18:20:35',
            ),
            7 => 
            array (
                'id' => 10,
                'name' => 'اذن صرف',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 18:22:09',
                'updated_at' => '2024-06-10 18:22:09',
            ),
            8 => 
            array (
                'id' => 11,
                'name' => 'اضافه مورد',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 18:25:32',
                'updated_at' => '2024-06-10 18:25:32',
            ),
            9 => 
            array (
                'id' => 12,
                'name' => 'حذف مورد',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 18:25:39',
                'updated_at' => '2024-06-10 18:25:39',
            ),
            10 => 
            array (
                'id' => 13,
                'name' => 'تعديل مورد',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 18:25:56',
                'updated_at' => '2024-06-10 18:25:56',
            ),
            11 => 
            array (
                'id' => 14,
                'name' => 'اضافه للمخزون',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 18:30:00',
                'updated_at' => '2024-06-10 18:30:00',
            ),
            12 => 
            array (
                'id' => 15,
                'name' => 'حذف فاتوره',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 22:13:56',
                'updated_at' => '2024-06-10 22:13:56',
            ),
            13 => 
            array (
                'id' => 16,
                'name' => 'حذف اذن طلب',
                'guard_name' => 'web',
                'created_at' => '2024-06-10 22:49:46',
                'updated_at' => '2024-06-10 22:56:35',
            ),
        ));
        
        
    }
}