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
            'certif_title' => 'Microsoft Azure Fundamentals',
            'certif_short_desc' => 'Sertifikasi ini ditawarkan oleh Microsoft untuk menguji pengetahuan dasar tentang layanan cloud Azure.',
            'certif_desc' => 'Sertifikasi ini dirancang untuk individu yang ingin memahami konsep dasar komputasi awan, layanan Azure, model pengelolaan, keamanan, serta privasi data di platform Azure. Memperoleh sertifikasi ini menunjukkan pemahaman tentang konsep-konsep dasar Azure yang diperlukan untuk peran dalam pengembangan, administrasi, atau penggunaan solusi cloud.',
            'certif_duration' => 45,
            'certif_cost' => 250000,
            'certif_outline' => 'Berikut merupakan outline untuk tes sertifikasi ini :
            1. Cloud concepts and core Azure services domains.
            2. Core solutions and management tools on Azure and general security and network security features.
            3. Identity, governance, privacy, and compliance features and Azure cost management and Service Level Agreements domains.',
            'created_by' => 1,
            'updated_by' => 1,
            'minimum_score' => 75,
            'certif_img' => 'azure.png',
        ]);
    }
}
