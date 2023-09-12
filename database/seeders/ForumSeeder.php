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
            'master_type_id' => 1,
            'forum_title' => 'Test Title',
            'forum_message' => 'Test Message Gimana Ya?',
            'forum_attachment' => 'Test Attachment.png'
        ]);
    }
}
