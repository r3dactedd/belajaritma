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
        Material::create([
            'course_id' => 1,         // Ganti dengan course_id yang sesuai
            'master_type_id' => 4,
            'title' => 'PDF Materi 1',
            'pdf_link' => '/path/to/pdf1.pdf',
        ]);

        // Contoh data Assignment Materi
        Material::create([
            'course_id' => 1,         // Ganti dengan course_id yang sesuai
            'material_type_id' => 5,
            'title' => 'Assignment Materi 1',
            'description' => 'Ini isian konten materi 1 setelah tekan sidebar'
        ]);

        // Contoh data Video Materi
        Material::create([
            'course_id' => 1,         // Ganti dengan course_id yang sesuai
            'material_type_id' => 6,
            'title' => 'Video Materi 1',
            'video_link' => 'https://www.youtube.com/watch?v=example1',
        ]);

        Material::create([
            'course_id' => 2,         // Ganti dengan course_id yang sesuai
            'master_type_id' => 4,
            'title' => 'PDF Materi 2',
            'pdf_link' => '/path/to/pdf1.pdf',
        ]);

        // Contoh data Assignment Materi
        Material::create([
            'course_id' => 2,         // Ganti dengan course_id yang sesuai
            'material_type_id' => 5,
            'title' => 'Assignment Materi 2',
            'description' => 'Ini isian konten materi 2 setelah tekan sidebar'
        ]);

        // Contoh data Video Materi
        Material::create([
            'course_id' => 2,         // Ganti dengan course_id yang sesuai
            'material_type_id' => 6,
            'title' => 'Video Materi 1',
            'video_link' => 'https://www.youtube.com/watch?v=example1',
        ]);
    }
}
