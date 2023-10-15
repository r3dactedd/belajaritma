<?php

namespace Database\Seeders;

use App\Models\Forum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Forum::create([
            'user_id' => 1,
            'course_id' => 1,
            'forum_title' => 'Test Title',
            'forum_message' => 'Test Message Gimana Ya?',
            'forum_attachment' => 'Test Attachment.png'
        ]);

        Forum::create([
            'user_id' => 2,
            'course_id' => 1,
            'forum_title' => 'Test Title2',
            'forum_message' => 'Test Message Kedua Gimana Ya?',
            'forum_attachment' => 'Test Attachment Kedua.png'
        ]);

        Forum::create([
            'user_id' => 3,
            'course_id' => 2,
            'forum_title' => 'Test Title3',
            'forum_message' => 'Test Message Ketiga Gimana Ya?',
            'forum_attachment' => 'Test Attachment Ketiga.png'
        ]);
    }
}
