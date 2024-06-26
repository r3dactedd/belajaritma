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
            'detailed_description' => 'Assignment ini akan mengecek pengetahuan anda untuk materi-materi Sesi 1, 2, dan 3.',
            'material_duration' => 5,
            'minimum_score' => 70,
            'total_questions' => 10,
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
            'title' => 'Intro to Algorithms',
            'description' => 'Video ini akan memberikan informasi tambahan mengenai algoritma-algoritma yang ada.',
            'material_duration' => 12,
            'video_link' => 'https://www.youtube.com/watch?v=rL8X2mlNHPM&ab_channel=CrashCourse',
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 2,
            'title' => 'Assignment 2',
            'description' => 'Assignment ini akan mengecek pengetahuan anda untuk materi-materi Sesi 6-8.',
            'detailed_description' => 'Assignment ini akan mengecek pengetahuan anda untuk materi-materi Sesi 6-8.',
            'material_duration' => 5,
            'minimum_score' => 70,
            'total_questions' => 5,
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 4,
            'title' => 'Final Test',
            'description' => 'Berikut adalah Final Test dari kursus Algoritma dan Pemograman',
            'material_duration' => 7,
            'minimum_score' => 70,
            'total_questions' => 15,
        ]);

        Material::create([
            'course_id' => 2,
            'master_type_id' => 1,
            'title' => 'Pengenalan Data Structure',
            'description' => 'Materi ini akan menjelaskan secara singkat mengenai Data Structure.',
            'material_duration' => 20,
            'pdf_link' => 'Sesi I_Pengenalan Data Structure.pdf',
        ]);


        Material::create([
            'course_id' => 2,
            'master_type_id' => 1,
            'title' => 'Linked List',
            'description' => 'Materi ini akan memberikan penjelasan lebih mengenai Array, mengenalkan konsep Linked List, serta menjelaskan perbedaan antara keduanya.',
            'material_duration' => 15,
            'pdf_link' => 'Sesi II_Linked List.pdf',
        ]);


        Material::create([
            'course_id' => 2,
            'master_type_id' => 1,
            'title' => 'Stack dan Queue',
            'description' => ' Materi ini akan memberikan penjelasan lebih mengenai konsep Stack, Queue, serta implementasinya dalam program.',
            'material_duration' => 30,
            'pdf_link' => 'Sesi III_Stack and Queue.pdf',
        ]);


        Material::create([
            'course_id' => 2,
            'master_type_id' => 2,
            'title' => 'Assignment 1',
            'description' => 'Assignment ini akan mengecek pengetahuan anda untuk materi-materi Sesi 1, 2, dan 3.',
            'detailed_description' => 'Assignment ini akan mengecek pengetahuan anda untuk materi-materi Sesi 1, 2, dan 3.',
            'material_duration' => 5,
            'minimum_score' => 70,
            'total_questions' => 4,
        ]);

        Material::create([
            'course_id' => 2,
            'master_type_id' => 1,
            'title' => 'Trees',
            'description' => ' Materi ini akan memberikan penjelasan mengenai dasar Trees (seperti node, root, leaf, parent, child), serta Tipe-tipenya seperti BST, AVL, RB Tree.',
            'material_duration' => 45,
            'pdf_link' => 'Sesi V_Trees.pdf',
        ]);

        Material::create([
            'course_id' => 2,
            'master_type_id' => 1,
            'title' => 'Graphs',
            'description' => 'Materi ini akan mengenalkan konsep dasar Graph (seperti vertex, edge, direction, dan weight), Representasi Graph, dan Algoritma traversal Graph.',
            'material_duration' => 40,
            'pdf_link' => 'Sesi VI_Graphs.pdf',
        ]);


        Material::create([
            'course_id' => 2,
            'master_type_id' => 1,
            'title' => 'Hashes',
            'description' => 'Materi ini akan memberikan penjelasan dan konsep dasar Hashing, hash function, dan implementasi Hash Table.',
            'material_duration' => 30,
            'pdf_link' => 'Sesi VII_Hashes.pdf',
        ]);


        Material::create([
            'course_id' => 2,
            'master_type_id' => 3,
            'title' => 'Data Structures Crash Course',
            'description' => 'Video ini akan memberikan informasi tambahan mengenai Data Structure.',
            'material_duration' => 20,
            'video_link' => 'https://www.youtube.com/watch?v=DuDz6B4cqVc&ab_channel=CrashCourse',
        ]);


        Material::create([
            'course_id' => 2,
            'master_type_id' => 2,
            'title' => 'Assignment 2',
            'description' => 'Assignment ini akan mengecek pengetahuan anda untuk materi-materi Sesi 5-7.',
            'detailed_description' => 'Assignment ini akan mengecek pengetahuan anda untuk materi-materi Sesi 5-7.',
            'material_duration' => 5,
            'minimum_score' => 70,
            'total_questions' => 4,
        ]);


        Material::create([
            'course_id' => 2,
            'master_type_id' => 4,
            'title' => 'Final Test',
            'description' => 'Berikut adalah Final Test dari kursus Data Structure',
            'material_duration' => 15,
            'minimum_score' => 70,
            'total_questions' => 15,
        ]);

        Material::create([
            'course_id' => 3,
            'master_type_id' => 1,
            'title' => 'Pengenalan Web Programming',
            'description' => 'Materi ini akan memberikan pengenalan mengenai konsep Web Programming.',
            'material_duration' => 20,
            'pdf_link' => 'Sesi VIII_ Implementasi Algoritma.pdf',
        ]);


    }
}
