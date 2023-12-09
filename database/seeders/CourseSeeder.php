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
            'short_desc' => 'Deskripsi Pendek 1',
            'course_desc' => 'Kursus ini akan mengarjakan dasar-dasar dari algoritma.',
            'level'=>"Dasar",
            'screen_resolution'=> '1328 x 800',
            'minimum_ram' => '2GB',
            'processor'=> 'Intel I5',
            'operating_system' => 'Windows',
            'other_programs'=> 'VS Code',
            'total_module' => 7,
            'last_accessed_material' => 2,
            'course_img' => 'luca.png',
            'created_by'=> 1,
            'updated_by'=> 1,
        ]);

        Course::create([
            'course_name' => 'Recursion',
            'short_desc' => 'Deskripsi Pendek 2',
            'course_desc' => 'Kursus ini akan mengarjakan dasar-dasar dari algoritma.',
            'level'=>"Menengah",
            'total_module' => 8,
            'screen_resolution'=> '1310 x 750',
            'minimum_ram' => '5GB',
            'processor'=> 'Intel I7',
            'operating_system' => 'Linux',
            'other_programs'=> 'VS Code',
            'last_accessed_material' => 3,
            'course_img' => 'Majima Defuses Bomb.png',
            'created_by'=> 1,
            'updated_by'=> 1,
        ]);

        Course::create([
            'course_name' => 'Repetition',
            'short_desc' => 'Deskripsi Pendek 3',
            'course_desc' => 'Kursus ini akan mengarjakan tentang repetition dengan menggunakan for, do, and while.',
            'level'=>"Mahir",
            'screen_resolution'=> '1259 x 800',
            'minimum_ram' => '7GB',
            'processor'=> 'Intel I8',
            'operating_system' => 'Mac OS',
            'other_programs'=> 'VS Code',
            'total_module' => 9,
            'last_accessed_material' => 2,
            'course_img' => 'Majima Kensetsu.png',
            'created_by'=> 1,
            'updated_by'=> 1,
        ]);
    }
}
