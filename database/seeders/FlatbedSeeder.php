<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlatbedSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('flatbeds')->insert([
            ['name_ar' => 'نصف هيدروليك', 'name' => 'Half Hydraulic', 'price' => 250, 'flatbed_type_id' => 1],
            ['name_ar' => 'هيدروليك فل داون', 'name' => 'Hydraulic Full Down', 'price' => 350, 'flatbed_type_id' => 1],
            ['name_ar' => 'ساطحة مغطاة', 'name' => 'Covered Flatbed', 'price' => 500, 'flatbed_type_id' => 1],
            ['name_ar' => 'نصف هيدروليك', 'name' => 'Half Hydraulic', 'price' => 500, 'flatbed_type_id' => 2],
            ['name_ar' => 'هيدروليك فل داون', 'name' => 'Hydraulic Full Down', 'price' => 700, 'flatbed_type_id' => 2],
            ['name_ar' => 'ساطحة مغطاة', 'name' => 'Covered Flatbed', 'price' => 1000, 'flatbed_type_id' => 2],
        ]);
    }
}
