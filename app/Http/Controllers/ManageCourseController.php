<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class ManageCourseController extends Controller
{
    //
    public function showCourseAdmin(Request $request){
        $searchKeyword = $request->input('searchKeyword');
        if($searchKeyword){
            $data = Course::where('course_name', 'like', "%$searchKeyword%")->get();
            return view('administrator.admin_courses.admin_course', compact('data'));
        }
        else{
            $data = Course::all();
            return view('administrator.admin_courses.admin_course',['data'=>$data]);
        }
    }

    public function createCourse(Request $request){
        $request->validate([
            'course_name' => 'required|string',
            'short_desc' => 'required|string',
            'course_desc' => 'required|string',
            'level'=> 'required|string',
            'screen_resolution'=> 'required|string',
            'minimum_ram' => 'required|string',
            'processor'=> 'required|string',
            'operating_system' => 'required|string',
            'other_programs'=> 'required|string',
        ]);
        $filename = Str::orderedUuid() . '.' . $request->file('course_img')->getClientOriginalExtension();
        $request->file('course_img')->storeAs('course_images', $filename, 'course_images');

        $course = new Course();
        $course->course_name = $request->course_name;
        $course->short_desc = $request->short_desc;
        $course->course_desc = $request->course_desc;
        $course->level = $request->level;
        $course->course_img = $filename;
        $course->screen_resolution = $request->screen_resolution;
        $course->minimum_ram = $request->minimum_ram;
        $course->processor = $request->processor;
        $course->operating_system = $request->operating_system;
        $course->other_programs = $request->other_programs;
        //Dummy Untuk Sementara
        //-----------------------
        $course->total_module = 1;
        //-----------------------
        $course->created_by = Auth()->user()->id;
        $course->updated_by = Auth()->user()->id;

        $course->save();
        // dd($course);
        return redirect('/manager/course')->with('success', 'Course creation successfull!');
    }

    public function editCoursePage($id){
        $data=Course::find($id);
        $material = Material::where('course_id', $id)->get();
        return view('administrator.admin_courses.admin_course_edit', ['data' => $data, 'material'=>$material]);
    }
    public function editCoursePOST(Request $request, $id){
        $validateCourse=$request->validate([
            'course_name' => 'required|string',
            'short_desc' => 'required|string',
            'course_desc' => 'required|string',
            'level'=> 'required|string',
            'screen_resolution'=> 'required|string',
            'minimum_ram' => 'required|string',
            'processor'=> 'required|string',
            'operating_system' => 'required|string',
            'other_programs'=> 'required|string',
        ]);
        $changeCourse = [];

        if ($request->hasFile('course_img')) {
            $filename = Str::orderedUuid() . "." . $request->file('course_img')->getClientOriginalExtension();
            $request->file('course_img')->storeAs('course_images', $filename, 'course_images');
            $changeCourse['course_img'] = $filename;
        }

        // Check if 'course_img' exists in the validated data
        if (array_key_exists('course_img', $validateCourse)) {
            unset($validateProfile['course_img']);
        }

        $changeCourse += [
            'course_name' => $validateCourse['course_name'],
            'short_desc' => $validateCourse['short_desc'],
            'course_desc' => $validateCourse['course_desc'],
            'level'=> $validateCourse['level'],
            'screen_resolution'=> $validateCourse['screen_resolution'],
            'minimum_ram' => $validateCourse['minimum_ram'],
            'processor'=> $validateCourse['processor'],
            'operating_system' => $validateCourse['operating_system'],
            'other_programs'=> $validateCourse['other_programs'],
            'total_module'=>2,
            'created_by' => Auth()->user()->id,
            'updated_by' => Auth()->user()->id,
        ];

        Course::where('id', $id)->update($changeCourse);
        return redirect('/manager/course')->with('success', 'Course edit successfull!');
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
