<?php

namespace Database\Seeders;

use App\Models\UserSidebarProgress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSidebarProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserSidebarProgress::create([
            'user_id' => 4,
            'sidebar_id' => 1,
            'course_id' => 1,
            'material_id' => 1,
            'is_locked' => false,
            'is_visible' => true
        ]);

        UserSidebarProgress::create([
            'user_id' => 4,
            'sidebar_id' => 2,
            'course_id' => 2,
            'material_id' => 2,
            'is_locked' => true,
            'is_visible' => false
        ]);

        UserSidebarProgress::create([
            'user_id' => 4,
            'sidebar_id' => 3,
            'course_id' => 1,
            'material_id' => 3,
            'is_locked' => true,
            'is_visible' => false
        ]);

        UserSidebarProgress::create([
            'user_id' => 4,
            'sidebar_id' => 4,
            'course_id' => 1,
            'material_id' => 4,
            'is_locked' => true,
            'is_visible' => false
        ]);

        UserSidebarProgress::create([
            'user_id' => 4,
            'sidebar_id' => 5,
            'course_id' => 1,
            'material_id' => 5,
            'is_locked' => true,
            'is_visible' => false
        ]);

        UserSidebarProgress::create([
            'user_id' => 4,
            'sidebar_id' => 6,
            'course_id' => 1,
            'material_id' => 6,
            'is_locked' => true,
            'is_visible' => false
        ]);

        UserSidebarProgress::create([
            'user_id' => 4,
            'sidebar_id' => 7,
            'course_id' => 1,
            'material_id' => 7,
            'is_locked' => true,
            'is_visible' => false
        ]);

        UserSidebarProgress::create([
            'user_id' => 4,
            'sidebar_id' => 8,
            'course_id' => 1,
            'material_id' => 8,
            'is_locked' => true,
            'is_visible' => false
        ]);

        UserSidebarProgress::create([
            'user_id' => 4,
            'sidebar_id' => 9,
            'course_id' => 1,
            'material_id' => 9,
            'is_locked' => true,
            'is_visible' => false
        ]);

        UserSidebarProgress::create([
            'user_id' => 4,
            'sidebar_id' => 10,
            'course_id' => 1,
            'material_id' => 10,
            'is_locked' => true,
            'is_visible' => false
        ]);

        UserSidebarProgress::create([
            'user_id' => 4,
            'sidebar_id' => 11,
            'course_id' => 1,
            'material_id' => 11,
            'is_locked' => true,
            'is_visible' => false
        ]);

    }
}
