<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\MasterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

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
        $getReply = Forum::all();
        return view('forum.forum_thread',['data'=>$data, 'getReply'=>$getReply]);
    }

    public function createReply(Request $request){
        Log::info('Request Data:', $request->all());
        $request->validate([
            'forum_message' => 'required|string',
        ]);

        $validator = Validator::make($request->all(), [
            'forum_message' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed'], 422);
        }

        $parentForum = Forum::find($request->input('reply_id'));

        $forum = new Forum([
            'user_id' => auth()->user()->id,
            'course_id' => $request->input('course_id'),
            'forum_message' => $request->input('forum_message'),
            'reply_id' => $parentForum->id,
        ]);

        $forum->save();
        // return Redirect::route('forumDetail', ['id' => $request->input('reply_id'),'course_id' => $request->input('course_id')])->with('success', 'Forum topic created successfully!');
        return response()->json(['message' => 'Forum reply created successfully']);
    }

}
