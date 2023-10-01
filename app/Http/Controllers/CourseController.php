<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function showData(Request $request){
        $searchKeyword = $request->input('search');
        if($searchKeyword){
            $data = Course::where('course_name', 'like', "%$searchKeyword%")->get();
            return view('courses.courses', compact('data'));
        }
        else{
            $data = Course::all();
            return view('courses.courses',['data'=>$data]);
        }
    }

    public function courseDetail($id){
        $data=Course::find($id);
        return view('courses.course_content',['data'=>$data]);
    }
}
