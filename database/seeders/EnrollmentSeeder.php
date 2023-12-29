<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Only Enrolled
        // Enrollment::create([
        //     'user_id' => 1,
        //     'course_id' => 1,
        //     'ready_for_final'=>false,
        //     'completed'=>false,
        // ]);

        //Ready for Final
        // Enrollment::create([
        //     'user_id' => 1,
        //     'course_id' => 1,
        //     'ready_for_final'=>true,
        //     'completed'=>false,
        // ]);

        //Passed
        // Enrollment::create([
        //     'user_id' => 1,
        //     'course_id' => 1,
        //     'ready_for_final'=>true,
        //     'completed'=>true,
        // ]);

    }
}
