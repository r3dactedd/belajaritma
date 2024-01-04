<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use App\Models\Material;
use App\Models\NestedReply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ForumController extends Controller
{
    //
    // public function showCourseData(Request $request){
    //     $searchKeyword = $request->input('searchKeyword');

    //     if ($searchKeyword) {
    //         $data = Course::where('course_name', 'like', "%$searchKeyword%")->get();
    //     } else {
    //         $data = Course::all();
    //     }

    //     $data = $data->map(function ($course) {
    //         $course->course_img_url = asset('uploads/course_images/' . $course->course_img);
    //         return $course;
    //     });

    //     return view('forum.forum_list', compact('data'));
    // }

    public function showCourseData(Request $request)
    {
        $user = $request->user();

        if ($user->role_id == 1) {
            $data = Course::all();

            $searchKeyword = $request->input('searchKeyword');

            if ($searchKeyword) {
                $data = $data->filter(function ($course) use ($searchKeyword) {
                    return stripos($course->course_name, $searchKeyword) !== false;
                });
            }

            $data = $data->map(function ($course) {
                $course->course_img_url = asset('uploads/course_images/' . $course->course_img);
                return $course;
            });

            return view('forum.forum_list', compact('data'));
        }

        if ($user->role_id == 2) {
            $data = $user->enrollments->map(function ($enrollment) {
                return $enrollment->course;
            });

            $searchKeyword = $request->input('searchKeyword');

            if ($searchKeyword) {
                $data = $data->filter(function ($course) use ($searchKeyword) {
                    return stripos($course->course_name, $searchKeyword) !== false;
                });
            }

            return view('forum.forum_list', compact('data'));
        }
    }


    public function showForumsByCourse($course_id, Request $request){
        $user = Auth::user();
        $searchKeyword = $request->input('searchKeyword');
        $onlyUserForums = $request->has('bordered-checkbox');
        $selectedMaterial = $request->input('selectedMaterial');
        $query = Forum::where('course_id', $course_id);

        if ($user && $user->role_id == 2) {
            $query->where('deleted_by_admin', 0);
        }

        if ($searchKeyword) {
            $query->where('forum_title', 'like', "%$searchKeyword%");
        }

        if ($onlyUserForums) {
            $userId = auth()->id();
            $query->where('user_id', $userId);
        }

        if ($selectedMaterial) {
            $query->whereHas('formToMaterial', function ($subquery) use ($selectedMaterial) {
                $subquery->where('title', $selectedMaterial);
            });
        }

        $forums = $query->with('formToUser')->get();
        $course = Course::find($course_id);
        $materials = Material::where('course_id', $course_id)->get();

        return view('forum.forum', [
            'forums' => $forums,
            'course' => $course,
            'materials' => $materials,
        ]);
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

    public function forumDetail($course_id, $id){
        $data = Forum::with('replies')->find($id);
        $getReply = $data ? $data->replies : [];

        return view('forum.forum_thread', ['data' => $data, 'getReply' => $getReply]);
    }

    public function createForum(Request $request)
    {
        if (!Auth::check()) {
            // Jika pengguna belum masuk, redirect ke halaman login dengan pesan peringatan
            return redirect()->route('login')->with('warning', 'Anda perlu masuk terlebih dahulu untuk membuat forum.');
        }
        Log::info('Request Data:', $request->all());

        $request->validate([
            'forum_title' => 'required|string|max:255',
            'forum_message' => 'required|string',
        ]);

        $validator = Validator::make($request->all(), [
            'forum_title' => 'required|string|max:255',
            'forum_message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed'], 422);
        }

        $forum = new Forum([
            'user_id' => auth()->user()->id,
            'course_id' => $request->input('course_id'),
            'forum_title' => $request->input('forum_title'),
            'material_id' => $request->input('material_id'),
            'forum_message' => $request->input('forum_message'),
        ]);

        // Save the forum to the database
        $forum->save();

        // Handle file upload
        if ($request->hasFile('forum_attachment')) {
            $filename = Str::orderedUuid() . '.' . $request->file('forum_attachment')->getClientOriginalExtension();
            $request->file('forum_attachment')->storeAs('forum_attachments', $filename, 'forum_attachments');
            $forum->forum_attachment = $filename;
            $forum->save();
        }

        // Redirect to the forum view with the forum ID
        return Redirect::route('forum.forum', ['course_id' => $forum->course_id])->with('success', 'Forum topic created successfully!');
    }
    public function deleteThread(Request $request, $courseId, $id)
    {
        $thread = Forum::findOrFail($id);

        if($request->reason_delete){
            $thread->deleted_by_admin = true;
            $thread->reason_delete = $request->reason_delete;
            $thread->save();
        }
        else{
            $thread->delete();
        }

        return redirect()->route('forum.forum', ['course_id' => $courseId])->with('success', 'Thread deleted successfully.');
    }

    public function createReply(Request $request){
        if (!Auth::check()) {
            // Jika pengguna belum masuk, redirect ke halaman login dengan pesan peringatan
            return redirect()->route('login')->with('warning', 'Anda perlu masuk terlebih dahulu untuk bisa melakukan reply forum.');
        }
        Log::info('Request Data:', $request->all());
        $request->validate([
            'forum_message' => 'required|string|max:255',
        ]);

        $validator = Validator::make($request->all(), [
            'forum_message' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);

        }

        $forum = new Forum([
            'user_id' => auth()->user()->id,
            'course_id' => $request->input('course_id'),
            'forum_message' => $request->input('forum_message'),
            'reply_id' => $request->input('reply_id'),
            'material_id' => $request->input('material_id'),
            'parent_id'=> $request->input('parent_id'),
        ]);

        $forum->save();

        if ($request->hasFile('forum_attachment')) {
            $filename = Str::orderedUuid() . '.' . $request->file('forum_attachment')->getClientOriginalExtension();
            $request->file('forum_attachment')->storeAs('forum_attachments', $filename, 'forum_attachments');
            $forum->forum_attachment = $filename;
            $forum->save();
        }
        // return Redirect::route('forumDetail', ['id' => $request->input('reply_id'),'course_id' => $request->input('course_id')])->with('success', 'Forum topic created successfully!');
        return response()->json(['message' => 'Forum reply created successfully']);
    }
}
