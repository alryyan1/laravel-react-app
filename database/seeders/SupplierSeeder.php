<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create(['name'=>'شركه تباشير الطبيه','phone'=>'0','email'=>'','address'=>'']);
        Supplier::create(['name'=>'شركه شيفاك','phone'=>'0','email'=>'','address'=>'']);
        Supplier::create(['name'=>'شركه سيمنس  ','phone'=>'0','email'=>'','address'=>'']);
        Supplier::create(['name'=>'شركه بايوستسم','phone'=>'0','email'=>'','address'=>'']);
        Supplier::create(['name'=>'شركه  الريان','phone'=>'0','email'=>'','address'=>'']);
    }
}
