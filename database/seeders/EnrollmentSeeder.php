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
        //
        Enrollment::create([
            'user_id' => 1,
            'course_id' => 1,
            'completed'=>true
        ]);

        Enrollment::create([
            'user_id' => 1,
            'course_id' => 2,
            'completed'=>false
        ]);
    }
}
