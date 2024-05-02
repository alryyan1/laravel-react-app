<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section =  Section::first();
        Item::create(['section_id'=>$section->id  ,'name'=>'حقنه','require_amount'=>5]);
        Item::create(['section_id'=>$section->id  ,'name'=>'Gloves','require_amount'=>5]);
        Item::create(['section_id'=>$section->id  ,'name'=>'EDTA','require_amount'=>5]);
        Item::create(['section_id'=>$section->id  ,'name'=>'Heparin','require_amount'=>5]);
        Item::create(['section_id'=>$section->id  ,'name'=>'UrineContainer','require_amount'=>5]);
        Item::create(['section_id'=>$section->id  ,'name'=>'yellow tips','require_amount'=>5]);
    }
}
