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
            'first_name' => 'Sumawira',
            'last_name' => 'Wijanata',
            'username' => 'admin1',
            'email' => 'suma@gmail.com',
            'password' => bcrypt('admin123'),
            'profile_img' => ''
        ]);

        User::create([
            'role_id' => '1',
            'first_name' => 'Ariel',
            'last_name' => 'Vito',
            'username' => 'admin2',
            'email' => 'vito@gmail.com',
            'password' => bcrypt('admin123'),
            'profile_img' => ''
        ]);

        User::create([
            'role_id' => '1',
            'first_name' => 'Azzel',
            'last_name' => 'Azzel',
            'username' => 'admin3',
            'email' => 'azzel@gmail.com',
            'password' => bcrypt('admin123'),
            'profile_img' => ''
        ]);

        User::create([
            'role_id' => '2',
            'first_name' => 'Ryan',
            'last_name' => 'Gosling',
            'username' => 'literally_me123',
            'email' => 'rgosling@gmail.com',
            'password' => bcrypt('user123'),
            'profile_img' => ''
        ]);
    }
}
