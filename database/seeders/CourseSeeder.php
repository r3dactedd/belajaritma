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
            'course_name' => 'Algoritma dan Pemrograman',
            'short_desc' => 'Kursus ini akan menjelaskan tentang Algoritma dan Pemrograman',
            'course_desc' => 'Longer Description',
            'level'=>"Dasar",
            'screen_resolution'=> '1328 x 800',
            'minimum_ram' => '8GB',
            'processor'=> 'Intel I5',
            'operating_system' => 'Windows',
            'other_programs'=> 'VS Code',
            'total_module' => 11,
            'total_time' => 142,
            'last_accessed_material' => 1,
            'course_img' => 'luca.png',
            'created_by'=> 1,
            'updated_by'=> 1,
        ]);
    }
}
