<?php

namespace Database\Seeders;

use App\Models\HomeForRent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeForRentSeeder extends Seeder
{
    public function run()
    {
        HomeForRent::factory(60)->create();
    }
}
