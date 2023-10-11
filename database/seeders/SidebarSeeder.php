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
            'title' => 'Module 1: Test Title 1',
            'type' => 'has-sub',
        ]);
        Sidebar::create([
            'course_id' => 1,
            'parent_id' => 1,
            'title' => 'Sub Module 1: Test Title 1',
            'type' => 'no-sub',
        ]);
        Sidebar::create([
            'course_id' => 1,
            'parent_id' => NULL,
            'title' => 'Module 2: Test Title 2',
            'type' => 'no-sub',
        ]);
    }
}
