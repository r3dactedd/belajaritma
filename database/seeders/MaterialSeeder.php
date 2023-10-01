<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Material::create([
            'course_id' => 1,
            'master_type_id' => 1,
            'material_title' => "Testing Material Basic Algo",
            'material_description' => "Testing Material Basic Algo Description",
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 1,
            'material_title' => "Testing Material Basic Algo 2",
            'material_description' => "Testing Material Basic Algo Description 2",
        ]);

        Material::create([
            'course_id' => 2,
            'master_type_id' => 1,
            'material_title' => "Testing Material Recursion Title",
            'material_description' => "Testing Material Recursion Description",
        ]);

        Material::create([
            'course_id' => 3,
            'master_type_id' => 1,
            'material_title' => "Testing Material Repetition Title",
            'material_description' => "Testing Material Repetition Description",
        ]);
    }
}
