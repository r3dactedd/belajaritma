<?php

namespace Database\Seeders;

use App\Models\UserCourseDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCourseDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserCourseDetail::create([
            'user_id' => 1,
            'course_id' => 1,
            'last_accessed_material' => 2,
        ]);
    }
}
