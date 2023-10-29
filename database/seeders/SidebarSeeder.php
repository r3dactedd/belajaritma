<?php

namespace Database\Seeders;

use App\Models\Sidebar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SidebarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sidebar::create([
            'course_id' => 1,
            'parent_id' => NULL,
            'material_id' => 1,
            'title' => 'Module 1: Test Title 1',
            'path' => '/materialContent/pdf'
        ]);
        Sidebar::create([
            'course_id' => 1,
            'parent_id' => 1,
            'material_id' => 2,
            'title' => 'Sub Module 1: Anggap aja ini sub menu',
            'path' => '/materialcontent/video'
        ]);
        Sidebar::create([
            'course_id' => 1,
            'parent_id' => NULL,
            'material_id' => 3,
            'title' => 'Module 2: Test Title Video',
            'path' => '/materialcontent/asg'
        ]);
    }
}
