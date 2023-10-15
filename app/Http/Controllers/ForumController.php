<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\MasterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ForumController extends Controller
{
    //
    public function showForumList(){
        $data = Forum::all();
        return view('forum.forum',['data'=>$data]);
    }

    public function forumDetail($id){
        $data=Forum::find($id);
        return view('forum.forum_content',['data'=>$data]);
    }

    public function createForum(Request $request){
        $request->validate([
            'forum_title' => 'required|string|max:255',
            'forum_message' => 'required|string',
            'forum_attachment' => 'nullable|file|max:2048',
        ]);

        $validator = Validator::make($request->all(), [
            'forum_title' => 'required|string|max:255',
            'forum_message' => 'required|string',
            'forum_attachment' => 'nullable|file|max:2048',
        ]);

        $forum = new Forum([
            'user_id' => auth()->user()->id,
            'master_type_id' => $request->input('master_type_id'),
            'forum_title' => $request->input('forum_title'),
            'forum_message' => $request->input('forum_message'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // Save the forum to the database
        $forum->save();

        return redirect()->route('forum.forum', ['id' => $forum->id])
            ->with('success', 'Forum topic created successfully!');
    }
}
