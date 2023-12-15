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
            'master_type_id' => 6,
            'title' => 'Ini Title untuk Video',
            'description' => 'Anak-anak, marilah nonton video sialan ini!',
            'video_link' => 'https://youtu.be/OMF8th2oMUU?si=rsRR26liLYDxivI_',
            'is_completed' => true
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 4,
            'title' => 'Ini Title untuk PDF (Child)',
            'description' => 'Anak-anak, marilah baca PDF biji sialan ini!',
            'video_link' => 'https://youtu.be/OMF8th2oMUU?si=rsRR26liLYDxivI_',
            'is_completed' => false
        ]);

        Material::create([
            'course_id' => 1,
            'master_type_id' => 5,
            'title' => 'Ini Title untuk Assignment',
            'description' => 'Anak-anak, marilah kerjakan assignment sialan ini!',
            'video_link' => 'https://youtu.be/OMF8th2oMUU?si=rsRR26liLYDxivI_',
            'is_completed' => false
        ]);

        Material::create([
            'course_id' => 2,
            'master_type_id' => 5,
            'title' => 'Ini Title untuk Assignment (Course 2)',
            'description' => 'Anak-anak, marilah kerjakan assignment sialan ini!',
            'video_link' => 'https://youtu.be/OMF8th2oMUU?si=rsRR26liLYDxivI_',
            'is_completed' => false
        ]);
    }
}
