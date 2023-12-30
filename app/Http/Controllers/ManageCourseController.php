<?php

namespace App\Http\Controllers;

use App\Models\AssignmentQuestions;
use App\Models\Course;
use App\Models\FinalTestQuestions;
use App\Models\MasterType;
use App\Models\Material;
use App\Models\Sidebar;
use App\Models\UserCourseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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


        if ($request->hasFile('course_img')) {
            $filename = Str::orderedUuid() . '.' . $request->file('course_img')->getClientOriginalExtension();
            $request->file('course_img')->storeAs('course_images', $filename, 'course_images');
        }
        else{
            $filename = 'placeholder.webp';
        }

        else{
            $filename = 'placeholder.webp';
        }

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
        $course->created_by = Auth()->user()->id;
        $course->updated_by = Auth()->user()->id;


        $course->save();
        $courseId = $course->id;

        $userCourseDetail = new UserCourseDetail();
        $userCourseDetail->user_id = Auth()->User()->id;
        $userCourseDetail->course_id = $course->id;
        $userCourseDetail->last_accessed_material = 0;

        $userCourseDetail->save();
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
        $type_list = MasterType::all();
        return view('administrator.admin_courses.admin_course_edit', ['data' => $data, 'courseId'=> $id, 'type_list'=>$type_list]);
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
        $type_list = MasterType::all();
        $material_list =Material::where('course_id', $id)->get();
        // dd($material_list);
        return view('administrator.admin_courses.admin_course_list', ['courseId'=> $id, 'type_list'=>$type_list, 'material_list'=>$material_list]);
    }

    public function createMaterial(Request $request, $id){
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'material_duration'=>'required|integer',
            'master_type_id'=>'required|integer',
        ]);
        $createMaterial = new Material();
        $createMaterial->title = $request->title;
        $createMaterial->description = $request->description;
        $createMaterial->material_duration = $request->material_duration;
        $createMaterial->master_type_id = $request->master_type_id;
        $createMaterial->course_id = $id;

        $createMaterial->save();
        $material_id = $createMaterial->id;

        $sidebarCount = Sidebar::where('course_id', $id)->count();

        $newSidebar = new Sidebar();
        $newSidebar->title = $createMaterial->title;
        $newSidebar->course_id = $id;
        $newSidebar->material_id = $material_id;
        $newSidebar->is_locked = false;
        $newSidebar->order = ($sidebarCount > 0) ? Sidebar::where('course_id', $id)->max('order') + 1 : 1;
        $newSidebar->path = '';
        $newSidebar->save();

        $updateUserCourseDetail = UserCourseDetail::where('user_id', auth()->id())->where('course_id', $id)->first();
        if ($updateUserCourseDetail->last_accessed_material === 0) {
            $updateUserCourseDetail->last_accessed_material = $material_id;
            $updateUserCourseDetail->save();
        }

        $addTimeAndModule= [];
        $addTimeAndModule = [
            'total_time' => \DB::raw('total_time + ' . $request->material_duration),
            'total_module' => \DB::raw('total_module + 1'),
        ];
        Course::where('id', $createMaterial->course_id)->update($addTimeAndModule);
        // dd($createMaterial);
        return Redirect::to("/manager/course/session/{$material_id}/edit");
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
        $assignment_questions = AssignmentQuestions::where('material_id', $id)->get();
        $final_test_questions = FinalTestQuestions::where('material_id', $id)->get();
        return view('administrator.admin_courses.admin_course_session', ['material'=>$material, 'assignment_questions'=>$assignment_questions, 'final_test_questions'=>$final_test_questions]);
        // dd($material);
    }

    public function editMaterialPOST(Request $request, $id){
        $validateMaterialData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        $changeMaterialData = [];

        $changeMaterialData += [
            'title'=> $validateMaterialData['title'],
            'description'=> $validateMaterialData['description'],
        ];
        Material::where('id', $id)->update($changeMaterialData);
        return Redirect::to("/manager/course/session/{$id}/edit");
        // dd($changeMaterialData);
    }

    public function editMaterialDetail(Request $request, $id){
        $material = Material::find($id);
        // dd($request);
        if($material->materialContentToMasterType->master_type_name == 'Video'){
            $validateVideo = $request->validate([
                'video_link'=>'required|string',
            ]);
            $changeMaterialDetail = [];

            $changeMaterialDetail += [
                'video_link'=> $validateVideo['video_link'],
            ];
            Material::where('id', $id)->update($changeMaterialDetail);
            return Redirect::to("/manager/course/materiallist/{$material->materialToCourse->id}");
        }
        if($material->materialContentToMasterType->master_type_name == 'PDF'){
            $validatePDF = $request->validate([
                'pdf_link'=>'file|mimes:pdf|max:2048',
            ]);
            $changeMaterialDetail = [];

            $changeMaterialDetail += [
                'pdf_link'=> $validatePDF['pdf_link'],
            ];

            $filename = Str::orderedUuid() . '.' . $request->file('pdf_link')->getClientOriginalExtension();
            $request->file('pdf_link')->storeAs('material_pdf', $filename, 'material_pdf');

            Material::where('id', $id)->update($changeMaterialDetail);
            return Redirect::to("/manager/course/materiallist/{$material->materialToCourse->id}");
        }
        if($material->materialContentToMasterType->master_type_name == 'Assignment' || $material->materialContentToMasterType->master_type_name == 'Final Test'){
            Log::info('Request Data:', $request->all());

            // dd($request);
            $validateAssignment = $request->validate([
                'detailed_description' => 'required|string|max:300',
                'minimum_score'=>'required|integer|max:100',
            ]);
            $changeMaterialDetail = [];

            $changeMaterialDetail += [
                'detailed_description'=> $validateAssignment['detailed_description'],
                'minimum_score'=> $validateAssignment['minimum_score'],
            ];
            // dd($changeMaterialDetail);
            Material::where('id', $id)->update($changeMaterialDetail);
            return Redirect::to("/manager/course/session/{$id}/edit");
        }
    }
    public function deleteMaterial($id){
        $material = Material::find($id);
        $decreaseTimeAndModule= [];
        $decreaseTimeAndModule = [
            'total_time' => \DB::raw('total_time - ' . $material->material_duration),
            'total_module' => \DB::raw('total_module - 1'),
        ];
        Course::where('id', $material->course_id)->update($decreaseTimeAndModule);
        if (!$material) {
            return redirect()->back()->with('error', 'Material not found.');
        }
        // dd($material);
        $material->delete();
        return Redirect::to("/manager/course/materiallist/{$material->materialToCourse->id}");
    }

    public function createAssignmentQuestions(Request $request, $id){
        Log::info('Request Data:', $request->all());
        $request->validate([
            'questions'=>'required|string',
            'jawaban_a'=>'required|string',
            'jawaban_b'=>'required|string',
            'jawaban_c'=>'required|string',
            'jawaban_d'=>'required|string',
            'jawaban_benar'=>'required|string',
            'question_img'=>'image|file',
        ]);
        $createAssignment = new AssignmentQuestions();
        $createAssignment->questions = $request->questions;
        $createAssignment->jawaban_a = $request->jawaban_a;
        $createAssignment->jawaban_b = $request->jawaban_b;
        $createAssignment->jawaban_c = $request->jawaban_c;
        $createAssignment->jawaban_d = $request->jawaban_d;
        $createAssignment->jawaban_benar = $request->jawaban_benar;
        $createAssignment->material_id = $id;

        $filename = '';
        if ($request->hasFile('question_img')) {
            // Proses upload file dan simpan ke storage atau folder yang diinginkan
            $filename = Str::orderedUuid() . '.' . $request->file('question_img')->getClientOriginalExtension();
            $request->file('question_img')->storeAs('asg_question_img', $filename, 'asg_question_img');
            $createAssignment->question_img =  $filename;
        }
        $addTotalQuestions = [];
        $addTotalQuestions = [
            'total_questions' => \DB::raw('total_questions + 1'),
        ];
        Material::where('id', $createAssignment->material_id)->update($addTotalQuestions);
        // dd($createAssignment);

        $createAssignment->save();
        return Redirect::to("/manager/course/session/{$id}/edit");
    }

    public function editAssignmentQuestions(Request $request){
        Log::info('Request Data:', $request->all());
        $validateAssignment=$request->validate([
            'questions'=>'required|string',
            'jawaban_a'=>'required|string',
            'jawaban_b'=>'required|string',
            'jawaban_c'=>'required|string',
            'jawaban_d'=>'required|string',
            'jawaban_benar'=>'required|string',
            'question_img'=>'image|file',
        ]);
        $changeAssignment = [];
        $filename = '';
        if ($request->hasFile('question_img')) {
            $filename = Str::orderedUuid() . '.' . $request->file('question_img')->getClientOriginalExtension();
            $request->file('question_img')->storeAs('asg_question_img', $filename, 'asg_question_img');
            $changeAssignment['question_img'] = $filename;
        }

        if (array_key_exists('question_img', $validateAssignment)) {
            unset($validateAssignment['question_img']);
        }


        $changeAssignment += [
            'questions'=> $validateAssignment['questions'],
            'jawaban_a'=>$validateAssignment['jawaban_a'],
            'jawaban_b'=>$validateAssignment['jawaban_b'],
            'jawaban_c'=>$validateAssignment['jawaban_c'],
            'jawaban_d'=>$validateAssignment['jawaban_d'],
            'jawaban_benar'=>$validateAssignment['jawaban_benar'],
        ];
        AssignmentQuestions::where('id', $request->assignment_id)->update($changeAssignment);

        // dd($request->assignment_id);
        // dd($request->material_id);
        return Redirect::to("/manager/course/session/{$request->material_id}/edit");
        // return redirect('/manager/course')->with('success', 'Course deleted successfully.');
    }

    public function deleteQuestion(Request $request){
        $assignment_questions = AssignmentQuestions::find($request->assignment_id);
        $material_id = $assignment_questions->questionToMaterial->id;
        if (!$assignment_questions) {
            return redirect()->back()->with('error', 'Assignment not found.');
        }
        $decreaseTotalQuestions = [];
        $decreaseTotalQuestions = [
            'total_questions' => \DB::raw('total_questions - 1'),
        ];
        Material::where('id', $material_id)->update($decreaseTotalQuestions);
        $assignment_questions->delete();
        // dd($assignment_questions);
        return Redirect::to("/manager/course/session/{$material_id}/edit");
    }

    public function createFinalTestQuestions(Request $request, $id){
        Log::info('Request Data:', $request->all());
        $request->validate([
            'questions'=>'required|string',
            'jawaban_a'=>'required|string',
            'jawaban_b'=>'required|string',
            'jawaban_c'=>'required|string',
            'jawaban_d'=>'required|string',
            'jawaban_benar'=>'required|string',
            'question_img'=>'image|file',
        ]);
        $createFinalTest = new FinalTestQuestions();
        $createFinalTest->questions = $request->questions;
        $createFinalTest->jawaban_a = $request->jawaban_a;
        $createFinalTest->jawaban_b = $request->jawaban_b;
        $createFinalTest->jawaban_c = $request->jawaban_c;
        $createFinalTest->jawaban_d = $request->jawaban_d;
        $createFinalTest->jawaban_benar = $request->jawaban_benar;
        $createFinalTest->material_id = $id;
        $filename = '';
        if ($request->hasFile('question_img')) {
            // Proses upload file dan simpan ke storage atau folder yang diinginkan
            $filename = Str::orderedUuid() . '.' . $request->file('question_img')->getClientOriginalExtension();
            $request->file('question_img')->storeAs('final_question_img', $filename, 'final_question_img');
            $createFinalTest->question_img =  $filename;
        }

        // dd($createAssignment);
        $addTotalQuestions = [];
        $addTotalQuestions = [
            'total_questions' => \DB::raw('total_questions + 1'),
        ];
        Material::where('id', $createFinalTest->material_id)->update($addTotalQuestions);

        $createFinalTest->save();
        return Redirect::to("/manager/course/session/{$id}/edit");
    }

    public function editFinalTestQuestions(Request $request){
        Log::info('Request Data:', $request->all());
        $validateFinal=$request->validate([
            'questions'=>'required|string',
            'jawaban_a'=>'required|string',
            'jawaban_b'=>'required|string',
            'jawaban_c'=>'required|string',
            'jawaban_d'=>'required|string',
            'jawaban_benar'=>'required|string',
            'question_img'=>'image|file',
        ]);
        $changeFinal = [];
        $filename = '';
        if ($request->hasFile('question_img')) {
            $filename = Str::orderedUuid() . '.' . $request->file('question_img')->getClientOriginalExtension();
            $request->file('question_img')->storeAs('final_question_img', $filename, 'final_question_img');
            $changeAssignment['question_img'] = $filename;
        }

        if (array_key_exists('question_img', $validateFinal)) {
            unset($validateFinal['question_img']);
        }

        $changeFinal += [
            'questions'=> $validateFinal['questions'],
            'jawaban_a'=>$validateFinal['jawaban_a'],
            'jawaban_b'=>$validateFinal['jawaban_b'],
            'jawaban_c'=>$validateFinal['jawaban_c'],
            'jawaban_d'=>$validateFinal['jawaban_d'],
            'jawaban_benar'=>$validateFinal['jawaban_benar'],
        ];
        FinalTestQuestions::where('id', $request->final_test_id)->update($changeFinal);

        // dd($request->assignment_id);
        // dd($request->material_id);
        return Redirect::to("/manager/course/session/{$request->material_id}/edit");
        // return redirect('/manager/course')->with('success', 'Course deleted successfully.');
    }
    public function deleteFinalTestQuestion(Request $request){
        $final_test_questions = FinalTestQuestions::find($request->final_test_id);
        $material_id = $final_test_questions->questionToMaterial->id;
        if (!$final_test_questions) {
            return redirect()->back()->with('error', 'Assignment not found.');
        }
        $decreaseTotalQuestions = [];
        $decreaseTotalQuestions = [
            'total_questions' => \DB::raw('total_questions - 1'),
        ];
        Material::where('id', $material_id)->update($decreaseTotalQuestions);
        $final_test_questions->delete();
        // dd($assignment_questions);
        return Redirect::to("/manager/course/session/{$material_id}/edit");
    }

}
