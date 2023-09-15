<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ManageCourseController extends Controller
{
    //
    public function showCourseAdmin(Request $request){
        $searchKeyword = $request->input('search');
        if($searchKeyword){
            $data = Course::where('course_name', 'like', "%$searchKeyword%")->get();
            return view('administrator.admin_course', compact('data'));
        }
        else{
            $data = Course::all();
            return view('administrator.admin_course',['data'=>$data]);
        }
    }
    public function deleteCourse($id){
    $course = Course::find($id);

    if (!$course) {
        return redirect()->back()->with('error', 'Course not found.');
    }

    $course->delete();

    return redirect('/manager/course')->with('success', 'Course deleted successfully.');
    }
}
