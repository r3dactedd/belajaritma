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
            // 'course_session' => 'Test 1 Video',
            'material_id'=>1,
            'forum_message' => 'Test Message Gimana Ya?',
            'forum_attachment' => 'Test Attachment.png',
            'reply_id'=>null,
        ]);

        Forum::create([
            'user_id' => 2,
            'course_id' => 1,
            'forum_title' => 'Test Title2',
            // 'course_session' => 'Test 2 PDF',
            'material_id'=>2,
            'forum_message' => 'Test Message Kedua Gimana Ya?',
            'forum_attachment' => 'Test Attachment Kedua.png',
            'reply_id'=>null,
        ]);

        Forum::create([
            'user_id' => 3,
            'course_id' => 2,
            'forum_title' => 'Test Title3',
            // 'course_session' => 'Test 1 Video',
            'material_id'=>4,
            'forum_message' => 'Test Message Ketiga Gimana Ya?',
            'forum_attachment' => 'Test Attachment Ketiga.png',
            'reply_id'=>null,
        ]);

        Forum::create([
            'user_id' => 3,
            'course_id' => 2,
            'material_id'=>4,
            // 'course_session' => 'Test 1 Video',
            'forum_title' => 'Test Course 2 Title',
            'forum_message' => 'Test Reply Course 2 Gimana Ya?',
            'forum_attachment' => 'Reply Course 2 Attachment.png',
            'reply_id'=>null,
        ]);

    }
}
