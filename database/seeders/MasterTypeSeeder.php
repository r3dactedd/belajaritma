<?php

namespace Database\Seeders;

use App\Models\MasterType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        MasterType::create([
            'master_type_code' => 'FORUM_TYPE',
            'master_type_name' => 'C Language',
        ]);
        MasterType::create([
            'master_type_code' => 'FORUM_TYPE',
            'master_type_name' => 'Artificial Inteligence',
        ]);
        MasterType::create([
            'master_type_code' => 'FORUM_TYPE',
            'master_type_name' => 'Database',
        ]);
        MasterType::create([
            'master_type_code' => 'MATERIAL_TYPE',
            'master_type_name' => 'Pdf',
        ]);
        MasterType::create([
            'master_type_code' => 'MATERIAL_TYPE',
            'master_type_name' => 'Assignment',
        ]);
        MasterType::create([
            'master_type_code' => 'MATERIAL_TYPE',
            'master_type_name' => 'Video',
        ]);
    }
}
