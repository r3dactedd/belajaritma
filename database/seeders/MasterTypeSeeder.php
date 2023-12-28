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
        MasterType::create([
            'master_type_code' => 'MATERIAL_TYPE',
            'master_type_name' => 'PDF',
        ]);
        MasterType::create([
            'master_type_code' => 'MATERIAL_TYPE',
            'master_type_name' => 'Assignment',
        ]);
        MasterType::create([
            'master_type_code' => 'MATERIAL_TYPE',
            'master_type_name' => 'Video',
        ]);
        MasterType::create([
            'master_type_code' => 'MATERIAL_TYPE',
            'master_type_name' => 'Final Test',
        ]);
    }
}
