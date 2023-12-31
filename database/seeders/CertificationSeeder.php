<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Certification::create([
            'certif_title' => 'Algoritma dan Pemrograman',
            'certif_short_desc' => 'Deskripsi Pendek 1',
            'certif_desc' => 'Kursus ini akan mengarjakan dasar-dasar dari algoritma.',
            'certif_duration'=>120,
            'certif_cost'=> 500000,
            'certif_outline' => 'Outline Algoritma dan Pemrograman',
            'created_by'=> 1,
            'updated_by'=> 1,
            'certif_img'=> 'placeholder.webp',
        ]);
        Certification::create([
            'certif_title' => 'Dummy Certif 1',
            'certif_short_desc' => 'Deskripsi Pendek 1',
            'certif_desc' => 'Kursus ini akan mengarjakan dasar-dasar dari algoritma.',
            'certif_duration'=>120,
            'certif_cost'=> 500000,
            'certif_outline' => 'Outline Algoritma dan Pemrograman',
            'created_by'=> 1,
            'updated_by'=> 1,
            'certif_img'=> 'placeholder.webp',
        ]);
        Certification::create([
            'certif_title' => 'Dummy Certif 2',
            'certif_short_desc' => 'Deskripsi Pendek 1',
            'certif_desc' => 'Kursus ini akan mengarjakan dasar-dasar dari algoritma.',
            'certif_duration'=>120,
            'certif_cost'=> 500000,
            'certif_outline' => 'Outline Algoritma dan Pemrograman',
            'created_by'=> 1,
            'updated_by'=> 1,
            'certif_img'=> 'placeholder.webp',
        ]);
    }
}
