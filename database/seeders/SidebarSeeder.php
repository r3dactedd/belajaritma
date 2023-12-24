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
            'parent_id' => null,
            'material_id' => 1,
            'order' => 1,
            'title' => 'Module 1: Test Title 1',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => false
        ]);
        Sidebar::create([
            'course_id' => 1,
            'parent_id' => 1,
            'order' => 2,
            'material_id' => 2,
            'title' => 'Sub Module 1: Anggap aja ini sub menu',
            'path' => '/courses/materialcontent/video',
            'is_locked' => false
        ]);
        Sidebar::create([
            'course_id' => 1,
            'parent_id' => null,
            'order' => 3,
            'material_id' => 3,
            'title' => 'Module 2: Test Title Video',
            'path' => '/courses/materialcontent/asg',
            'is_locked' => true
        ]);
    }
}
