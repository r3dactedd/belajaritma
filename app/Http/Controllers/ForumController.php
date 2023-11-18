<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\MasterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;

class ForumController extends Controller
{
    //
    public function showCourseData(Request $request){
        $searchKeyword = $request->input('searchKeyword');
        if($searchKeyword){
            $data = Course::where('course_name', 'like', "%$searchKeyword%")->get();
            return view('forum.forum_list', compact('data'));
        }
        else{
            $data = Course::all();
            return view('forum.forum_list',['data'=>$data]);
        }
    }

    public function showForumsByCourse($course_id, Request $request){
        $searchKeyword = $request->input('searchKeyword');
        if($searchKeyword){
            $forums = Forum::where('course_id', $course_id)->
            where('forum_title', 'like', "%$searchKeyword%")
            ->get();
            $course = Course::find($course_id);
            return view('forum.forum', ['forums' => $forums, 'course' => $course]);
        }
        else{
            $forums = Forum::where('course_id', $course_id)->get();
            $course = Course::find($course_id);
            return view('forum.forum', ['forums' => $forums, 'course' => $course]);
        }
        // dd($course);
        // dd($forums);
    }

    public function manageForumList(Request $request){
        $searchKeyword = $request->input('searchKeyword');
        if($searchKeyword){
            $data = Forum::where('forum_title', 'like', "%$searchKeyword%")->get();
            return view('administrator.admin_forum',['data'=>$data]);
        }
        else{
            $data = Forum::all();
            return view('administrator.admin_forum',['data'=>$data]);
        }

    }

    public function forumDetail($course_id,$id){
        $data=Forum::find($id);
        return view('forum.forum_thread',['data'=>$data]);
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