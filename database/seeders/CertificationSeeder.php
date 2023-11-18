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
            'certif_title' => 'Basic Algorithm',
            'certif_short_desc' => 'Deskripsi Pendek 1',
            'certif_desc' => 'Kursus ini akan mengarjakan dasar-dasar dari algoritma.',
            'certif_img' => 'luca.png',
            'certif_duration'=>120,
            'certif_cost'=> 500000,
            'certif_outline' => 'Outline Basic Algo',
            'created_by'=> 1,
            'updated_by'=> 1,
        ]);
    }
}