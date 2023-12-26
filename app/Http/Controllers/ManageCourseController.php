<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
            'course_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $filename = '';
        if ($request->hasFile('course_img')) {
            // Proses upload file dan simpan ke storage atau folder yang diinginkan
            $filename = Str::orderedUuid() . '.' . $request->file('course_img')->getClientOriginalExtension();
            $request->file('course_img')->storeAs('course_images', $filename, 'course_images');
        }

        $course = new Course();
        $course->course_name = $request->course_name;
        $course->short_desc = $request->short_desc;
        $course->course_desc = $request->course_desc;
        $course->level = $request->level;
        $course->course_img = $filename;
        $course->screen_resolution = $request->screen_resolution;
        $course->total_module = 0;
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
        $courseId = $course->id;

        // dd($course);
        // return response()->json(['courseId' => $course->id]);
        // return response()->json(['courseId' => $course->id]);
        return Redirect::route('manager.course.materiallist', ['courseId' => $courseId])
        ->with('success', 'Course created successfully!')
        ->with('courseId', $courseId)
        ->with('course', $course);
        // return (string)$course->id;
    }


    public function editCoursePage($id){
        $data=Course::find($id);
        $material = Material::where('course_id', $id)->get();
        return view('administrator.admin_courses.admin_course_edit', ['data' => $data, 'material'=>$material, 'courseId'=> $id]);
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
            unset($validateCourse['course_img']);
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

    public function showMaterialList($id){
        return view('administrator.admin_courses.admin_course_list', ['courseId'=> $id]);
    }

    public function deleteCourse($id){
        $course = Course::find($id);

        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }
        $course->delete();
        return redirect('/manager/course')->with('success', 'Course deleted successfully.');
    }
    public function editMaterialGET($id){
        $material = Material::find($id);
        return view('administrator.admin_courses.admin_course_session', ['material'=>$material]);
        // dd($material);
    }
    public function deleteMaterial($id){
        $material = Material::find($id);

        if (!$material) {
            return redirect()->back()->with('error', 'Material not found.');
        }
        // dd($material);
        $material->delete();
        return redirect('/manager/course')->with('success', 'Material deleted successfully.');
    }
}
