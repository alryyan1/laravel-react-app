<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Deno;
use App\Models\Deposit;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\PaymentType;
use App\Models\Shift;
use App\Models\Specialist;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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

        Permission::create(['name' => 'اضافه منتج']);
        Permission::create(['name' => 'تعديل منتج']);
        Permission::create(['name' => 'عرض منتج']);
        Permission::create(['name' => 'admin']);
        PaymentType::create(['name'=>'Cash']);
        PaymentType::create(['name'=>'Transfer']);
        PaymentType::create(['name'=>'Bank']);

        Deno::create(['name'=>100]);
        Deno::create(['name'=>200]);
        Deno::create(['name'=>500]);
        Deno::create(['name'=>1000]);

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
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ChildTestOptionsTableSeeder::class);
        $this->call(CbcBindingsTableSeeder::class);
        $this->call(ChemistryBindingsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
