<?php

namespace Database\Seeders;

use App\Models\ModuleContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ModuleContent::create([
            'material_id' => 1,
            'content_title' => "Testing Content Title",
            'content_description' => "Testing Content Description",
            'is_completed' => true,
        ]);
        ModuleContent::create([
            'material_id' => 1,
            'content_title' => "Testing Content Title 2",
            'content_description' => "Testing Content Description 2",
            'is_completed' => false,
        ]);

        ModuleContent::create([
            'material_id' => 2,
            'content_title' => "Testing Second Content Title 2",
            'content_description' => "Testing Second Content Description 2",
            'is_completed' => false,
        ]);
    }
}
