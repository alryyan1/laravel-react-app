<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create([ 'name' => ' محاليل ']);
        Section::create(['name'=> 'عينات الروتين']);
        Section::create(['name'=> ' كيمياء']);
        Section::create(['name'=> 'هرمون']);
        Section::create(['name'=> 'مستهلكات الCBC']);
    }
}
