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
            'course_desc' => 'Kursus ini akan mengarjakan dasar-dasar dari algoritma.',
            'total_module' => 7,
            'course_img' => 'luca.png'
        ]);

        Course::create([
            'course_name' => 'Recursion',
            'course_desc' => 'Kursus ini akan mengarjakan tentang recursions.',
            'total_module' => 8,
            'course_img' => 'Majima Defuses Bomb.png'
        ]);

        Course::create([
            'course_name' => 'Repetition',
            'course_desc' => 'Kursus ini akan mengarjakan tentang repetition dengan menggunakan for, do, and while.',
            'total_module' => 9,
            'course_img' => 'Majima Kensetsu.png'
        ]);
    }
}
