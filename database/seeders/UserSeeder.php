<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => '1',
            'full_name' => 'Sumawira Wijanata',
            'about_me' => 'I am Admin 1',
            'username' => 'admin1',
            'email' => 'suma@gmail.com',
            'password' => bcrypt('admin123'),
            'profile_img' => '',
        ]);

        User::create([
            'role_id' => '1',
            'full_name' => 'Ariel Vito',
            'about_me' => 'I am Admin 2',
            'username' => 'admin2',
            'email' => 'vito@gmail.com',
            'password' => bcrypt('admin123'),
            'profile_img' => 'test_img1.png',
        ]);

        User::create([
            'role_id' => '1',
            'full_name' => 'Azzel Reyhanth Aristo',
            'about_me' => 'I am Admin 3',
            'username' => 'admin3',
            'email' => 'azzel@gmail.com',
            'password' => bcrypt('admin123'),
            'profile_img' => '',
        ]);

        User::create([
            'role_id' => '2',
            'full_name' => 'Ryan Gosling',
            'about_me' => 'I am User 1',
            'username' => 'literally_me123',
            'email' => 'rgosling@gmail.com',
            'password' => bcrypt('user123'),
            'profile_img' => '',
        ]);
    }
}
