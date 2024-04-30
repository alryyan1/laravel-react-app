<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create(['name'=>'المعمل','phone'=>'0','email'=>'','address'=>'']);
        Client::create(['name'=>' الصيدليه','phone'=>'0','email'=>'','address'=>'']);
        Client::create(['name'=>' العيادات ','phone'=>'0','email'=>'','address'=>'']);
    }
}
