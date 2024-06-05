<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Deposit;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Shift;
use App\Models\Specialist;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        //Specialist::truncate();
        //Doctor::truncate();

        Shift::create();
        User::create(['username'=>'starsIntaj','password'=>bcrypt('starsIntaj')]);
       $specialist =  Specialist::create(['name'=>'الباطنيه']);
       $doctor = Doctor::factory(10)->create();
//       Patient::factory(10)->create();
        $this->call(UnitsTableSeeder::class);
        $this->call(PackageTableSeeder::class);
        $this->call(ContainersTableSeeder::class);
        $this->call(MainTestsTableSeeder::class);
        $this->call(ChildTestsTableSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(SupplierSeeder::class);
        Deposit::create(['bill_number'=>'123','bill_date'=>now(),'complete'=>1,'supplier_id'=>1]);

        $this->call(ClientSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ServiceGroupsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(DepositItemsTableSeeder::class);
    }
}
