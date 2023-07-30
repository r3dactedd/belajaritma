<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function showData(){
        $data = Course::all();
        return view('courses.courses',['data'=>$data]);
    }
}
