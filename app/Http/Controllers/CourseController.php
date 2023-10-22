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
        $searchKeyword = $request->input('search');
        if($searchKeyword){
            $data = Course::where('course_name', 'like', "%$searchKeyword%")->get();
            return view('contents.courses', compact('data'));
        }
        else{
            $data = Course::all();
            return view('contents.courses',['data'=>$data]);
        }
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

    public function materialDetail($id, Request $request){
        $data=Material::find($id);
        $index = $request->input('index');
        return view('courses.course_pdf', ['data' => $data, 'index' => $index]);
        // dd($contentArray);
    }
}
