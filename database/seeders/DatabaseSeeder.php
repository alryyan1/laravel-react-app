<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Deno;
use App\Models\Deposit;
use App\Models\Doctor;
use App\Models\DrugCategory;
use App\Models\Patient;
use App\Models\PaymentType;
use App\Models\PharmacyType;
use App\Models\Shift;
use App\Models\Specialist;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

        DrugCategory::create(['name'=>'الجهاز التنفسي']);
        PharmacyType::create(['name'=>'حبوب']);
        Permission::create(['name' => 'اضافه منتج']);
        Permission::create(['name' => 'تعديل منتج']);
        Permission::create(['name' => 'عرض منتج']);




        PaymentType::create(['name'=>'Cash']);
        PaymentType::create(['name'=>'Transfer']);
        PaymentType::create(['name'=>'Bank']);
        Role::create(['name'=>'admin']);

        Deno::create(['name'=>0.1]);
        Deno::create(['name'=>0.5]);
        Deno::create(['name'=>1]);
        Deno::create(['name'=>5]);
        Deno::create(['name'=>10]);
        Deno::create(['name'=>20]);
        Deno::create(['name'=>50]);

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
//        Deposit::create(['bill_number'=>'123','bill_date'=>now(),'complete'=>1,'supplier_id'=>1]);

        $this->call(ClientSeeder::class);
//        $this->call(ItemsTableSeeder::class);
        $this->call(ServiceGroupsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
//        $this->call(DepositItemsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
//        $this->call(RolesTableSeeder::class);
        $this->call(ChildTestOptionsTableSeeder::class);
        $this->call(CbcBindingsTableSeeder::class);
        $this->call(ChemistryBindingsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(RoutesTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(UserRoutesTableSeeder::class);
    }
}
