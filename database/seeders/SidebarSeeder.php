<?php

namespace Database\Seeders;

use App\Models\Sidebar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SidebarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sidebar::create([
            'course_id' => 1,
            'parent_id' => null,
            'material_id' => 1,
            'order' => 1,
            'title' => 'Pengenalan Algoritma dan Pemrograman',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => false,
        ]);

        Sidebar::create([
            'course_id' => 1,
            'parent_id' => null,
            'material_id' => 2,
            'order' => 2,
            'title' => 'Variabel, Tipe Data, dan Operator',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 1,
            'parent_id' => null,
            'material_id' => 3,
            'order' => 3,
            'title' => 'Control Flow',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 1,
            'parent_id' => null,
            'material_id' => 4,
            'order' => 4,
            'title' => 'Datatypes in C',
            'path' => '/courses/materialContent/video',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 1,
            'parent_id' => null,
            'material_id' => 5,
            'order' => 5,
            'title' => 'Assignment 1',
            'path' => '/courses/materialContent/assignment',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 1,
            'parent_id' => null,
            'material_id' => 6,
            'order' => 6,
            'title' => 'Pengenalan Function dan Recursion',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 1,
            'parent_id' => null,
            'material_id' => 7,
            'order' => 7,
            'title' => 'Pengenalan Array',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 1,
            'parent_id' => null,
            'material_id' => 8,
            'order' => 8,
            'title' => 'Contoh Algoritma Sederhana',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 1,
            'parent_id' => null,
            'material_id' => 9,
            'order' => 9,
            'title' => 'Intro to Algorithms',
            'path' => '/courses/materialContent/video',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 1,
            'parent_id' => null,
            'material_id' => 10,
            'order' => 10,
            'title' => 'Assignment 2',
            'path' => '/courses/materialContent/assignment',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 1,
            'parent_id' => null,
            'material_id' => 11,
            'order' => 11,
            'title' => 'Final Test',
            'path' => '/courses/materialContent/finaltest',
            'is_locked' => true,
        ]);


        Sidebar::create([
            'course_id' => 2,
            'parent_id' => null,
            'material_id' => 12,
            'order' => 1,
            'title' => 'Pengenalan Data Structure',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => false,
        ]);

        Sidebar::create([
            'course_id' => 2,
            'parent_id' => null,
            'material_id' => 13,
            'order' => 2,
            'title' => 'Array dan Linked List',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 2,
            'parent_id' => null,
            'material_id' => 14,
            'order' => 3,
            'title' => 'Stack dan Queue',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => true,
        ]);



        Sidebar::create([
            'course_id' => 2,
            'parent_id' => null,
            'material_id' => 15,
            'order' => 4,
            'title' => 'Assignment 1',
            'path' => '/courses/materialContent/assignment',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 2,
            'parent_id' => null,
            'material_id' => 16,
            'order' => 5,
            'title' => 'Trees',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 2,
            'parent_id' => null,
            'material_id' => 17,
            'order' => 6,
            'title' => 'Graphs',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 2,
            'parent_id' => null,
            'material_id' => 18,
            'order' => 7,
            'title' => 'Hashes',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 2,
            'parent_id' => null,
            'material_id' => 19,
            'order' => 8,
            'title' => 'Data Structures in Depth',
            'path' => '/courses/materialContent/video',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 2,
            'parent_id' => null,
            'material_id' => 20,
            'order' => 9,
            'title' => 'Assignment 2',
            'path' => '/courses/materialContent/assignment',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 2,
            'parent_id' => null,
            'material_id' => 21,
            'order' => 10,
            'title' => 'Final Test',
            'path' => '/courses/materialContent/finaltest',
            'is_locked' => true,
        ]);

        Sidebar::create([
            'course_id' => 3,
            'parent_id' => null,
            'material_id' => 22,
            'order' => 1,
            'title' => 'Pengenalan Web Programming',
            'path' => '/courses/materialContent/pdf',
            'is_locked' => false,
        ]);

    }
}
