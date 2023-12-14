<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\MasterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use App\Models\Material;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ForumController extends Controller
{
    //
    public function showCourseData(Request $request){
        $searchKeyword = $request->input('searchKeyword');

        if ($searchKeyword) {
            $data = Course::where('course_name', 'like', "%$searchKeyword%")->get();
        } else {
            $data = Course::all();
        }

        $data = $data->map(function ($course) {
            $course->course_img_url = asset('uploads/course_images/' . $course->course_img);
            return $course;
        });

        return view('forum.forum_list', compact('data'));
    }

    public function showForumsByCourse($course_id, Request $request){
        $searchKeyword = $request->input('searchKeyword');
        if($searchKeyword){
            $forums = Forum::where('course_id', $course_id)
                ->where('forum_title', 'like', "%$searchKeyword%")
                ->with('formToUser')
                ->get();
            $course = Course::find($course_id);
            return view('forum.forum', ['forums' => $forums, 'course' => $course]);
        }
        else{
            $forums = Forum::where('course_id', $course_id)
                ->with('formToUser')
                ->get();
            $course = Course::find($course_id);
            $materials = Material::where('course_id', $course_id)->get();
            return view('forum.forum', ['forums' => $forums, 'course' => $course, 'materials'=>$materials]);
        }
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
        $profileImageUrl = asset('uploads/profile_images/' . $data->formToUser->profile_img);
        $getReply = Forum::all();
        return view('forum.forum_thread',['data'=>$data, 'getReply'=>$getReply, 'profileImageUrl'=>$profileImageUrl]);
    }

    public function createForum(Request $request){
        Log::info('Request Data:', $request->all());
        $request->validate([
            'course_session' => 'required|string|max:255',
            'forum_title' => 'required|string|max:255',
            'forum_message' => 'required|string'
        ]);

        $validator = Validator::make($request->all(), [
            'course_session' => 'required|string|max:255',
            'forum_title' => 'required|string|max:255',
            'forum_message' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed'], 422);
        }

        $forum = new Forum([
            'user_id' => auth()->user()->id,
            'course_id' => $request->input('course_id'),
            'forum_title' => $request->input('forum_title'),
            'course_session' => $request->input('course_session'),
            'forum_message' => $request->input('forum_message')
        ]);


        if ($request->input('forum_attachment')) {
            // Get the uploaded file
            $file = $request->input('forum_attachment');

            // Set a unique filename for the image
            $filename = time().
            '_'.$file->getClientOriginalName();

            // Move the file to the storage directory
            $file->move(public_path('forum_attachments'), $filename);

            // Save the filename to the 'forum_attachment' column
            $forum->forum_attachment = $filename;
        }

        // Save the forum to the database
        $forum->save();

        // Redirect to the forum view with the forum ID
        return Redirect::route('forum.forum', ['course_id' => $forum->course_id])->with('success', 'Forum topic created successfully!');
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
