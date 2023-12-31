<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Material::create([
            'course_id' => 1,
            'master_type_id' => 1,
            'title' => 'Pengenalan Algoritma dan Pemrograman',
            'description' => 'Materi ini akan menjelaskan secara singkat mengenai algoritma pemrograman serta bahasa pemrograman C yang akan dipakai untuk kursus ini.',
            'material_duration' => 15,
            'pdf_link' => 'Sesi I _ Pengenalan Algoritma dan Pemrograman.pdf',
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 1,
            'title' => 'Variabel, Tipe Data, dan Operator',
            'description' => 'Materi ini akan mengenalkan variabel pada pemrograman, tipe-tipe data yang umum, serta operator untuk memanipulasi data tersebut.',
            'material_duration' => 15,
            'pdf_link' => 'Sesi II_ Variabel, Tipe Data, dan Operator.pdf',
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 1,
            'title' => 'Control Flow',
            'description' => ' Materi ini akan menjelaskan aliran data pada pemrograman, seperti if-else statements, loops (for, while)',
            'material_duration' => 30,
            'pdf_link' => 'Sesi III_ Control Flow.pdf',
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 3,
            'title' => 'Datatypes in C',
            'description' => 'Video ini akan memberikan materi tambahan mengenai Data Type di C.
            ',
            'material_duration' => 8,
            'video_link' => 'https://www.youtube.com/watch?v=wnbzTjWr5gY&ab_channel=Simplilearn',
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 2,
            'title' => 'Assignment 1',
            'description' => 'Assignment ini akan mengecek pengetahuan anda untuk materi-materi Sesi 1, 2, dan 3.',
            'material_duration' => 5,
            'minimum_score' => 70,
            'total_questions'=> 10,
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 1,
            'title' => 'Pengenalan Function dan Recursion',
            'description' => 'Materi ini akan mengenalkan konsep Function dan Recursion yang akan digunakan dalam pemrograman.',
            'material_duration' => 10,
            'pdf_link' => 'Sesi VI_ Pengenalan Function dan Recursion.pdf',
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 1,
            'title' => 'Pengenalan Array',
            'description' => 'Materi ini akan menjelaskan mengenai konsep sebuah array dalam pemrograman',
            'material_duration' => 15,
            'pdf_link' => 'Sesi VII_ Pengenalan Array.pdf',
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 1,
            'title' => 'Contoh Algoritma Sederhana',
            'description' => 'Materi ini akan memberikan penjelasan dan contoh mengenai algoritma sederhana yang sering dipakai dalam pemrograman.',
            'material_duration' => 20,
            'pdf_link' => 'Sesi VIII_ Implementasi Algoritma.pdf',
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 3,
            'title' => 'Datatypes in C',
            'description' => 'Video ini akan memberikan informasi tambahan mengenai algoritma-algoritma yang ada.',
            'material_duration' => 12,
            'video_link' => 'https://youtu.be/rL8X2mlNHPM?si=7lPQS8ODzGGPC4Ly',
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 2,
            'title' => 'Assignment 2',
            'description' => 'Assignment ini akan mengecek pengetahuan anda untuk materi-materi Sesi 6-8.',
            'material_duration' => 5,
            'minimum_score' => 70,
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 4,
            'title' => 'Final Test',
            'description' => 'Berikut adalah Final Test dari kursus Algoritma dan Pemograman',
            'material_duration' => 7,
            'minimum_score' => 70,
            'total_questions'=> 15,

        ]);


    }
}
