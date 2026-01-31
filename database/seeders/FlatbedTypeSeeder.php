<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Flatbed_type;

class FlatbedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // إدخال الأنواع (مثال)
        Flatbed_type::create([
            'name' => 'Go',
            'name_ar' => 'ذهاب',
        ]);

        Flatbed_type::create([
            'name' => 'Round Trip',
            'name_ar' => 'ذهاب و عودة',
        ]);
    }
}
