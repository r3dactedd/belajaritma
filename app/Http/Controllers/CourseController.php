<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\ModuleContent;
use App\Models\Material;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function showData(Request $request){
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

        return view('contents.courses', compact('data'));
    }

    public function courseDetail($id){
        $data=Course::find($id);
        $material = Material::where('course_id', $id)->get();
        $contentArray = [];

        foreach ($material as $materials) {
            $contentArray[$materials->id] = ModuleContent::where('material_id', $materials->id)->get();
        }
        return view('contents.course_details', ['data' => $data, 'material' => $material, 'contentArray' => $contentArray]);
        // dd($contentArray);
    }

    public function materialDetail($title,$id, $material_id){
        $data=Material::find($id);
        return view('contents.session_assignment', ['data' => $data]);
        // dd($contentArray);
    }
}
