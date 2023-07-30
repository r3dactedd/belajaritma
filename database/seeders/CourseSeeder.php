<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::create([
            'course_name' => 'Basic Algorithm',
            'course_desc' => 'Kursus ini akan mengarjakan dasar-dasar dari algoritma.'
        ]);

        Course::create([
            'course_name' => 'Recursion',
            'course_desc' => 'Kursus ini akan mengarjakan tentang recursions.'
        ]);

        Course::create([
            'course_name' => 'Repetition',
            'course_desc' => 'Kursus ini akan mengarjakan tentang repetition dengan menggunakan for, do, and while.'
        ]);
    }
}
