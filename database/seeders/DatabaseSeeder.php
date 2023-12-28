<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(MasterTypeSeeder::class);
        $this->call(MaterialSeeder::class);
        $this->call(SidebarSeeder::class);
        $this->call(ForumSeeder::class);
        $this->call(ModuleContentSeeder::class);
        $this->call(CertificationSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(EnrollmentSeeder::class);
        $this->call(RegistrationCertificationSeeder::class);
        $this->call(AssignmentQuestionsSeeder::class);
        $this->call(FinalTestQuestionsSeeder::class);
    }
}
