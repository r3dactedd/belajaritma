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
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            'course_name' => 'required|string|max:50',
            'short_desc' => 'required|string|max:150',
            'course_desc' => 'required|string|max:500',
            'level'=> 'required|string',
            'screen_resolution'=> 'required|string|max:50',
            'minimum_ram' => 'required|string|max:50',
            'processor'=> 'required|string|max:50',
            'operating_system' => 'required|string|max:50',
            'other_programs'=> 'required|string|max:500',
            'course_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }


        if ($request->hasFile('course_img')) {
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
    public function unpublishCourse($id){
        $data=Course::find($id);
        $data->ready_for_publish = false;
        $data->updated_by = Auth()->user()->id;;
        $data->save();
        return Redirect::to("/manager/course/edit/{$id}");
    }

    public function publishCourse($id){
        $data=Course::find($id);
        $materialCount = Material::where('course_id', $id)->count();

        // Memeriksa apakah kursus memiliki setidaknya satu materi
        if ($materialCount > 0) {
            $data->ready_for_publish = true;
            $data->updated_by = auth()->user()->id;
            $data->save();

            return response()->json(['success' => true, 'redirect_url' => "/manager/course/edit/{$id}"]);
        } else {
            // Jika kursus tidak memiliki materi, berikan pesan kesalahan
            return response()->json(['error' => 'Kursus belum memiliki materi. Silahkan tambahkan setidaknya satu materi.']);
        }
    }
    public function editCoursePOST(Request $request, $id){
        $rules = [
            'course_name' => 'required|string|max:50',
            'short_desc' => 'required|string|max:150',
            'course_desc' => 'required|string|max:500',
            'level'=> 'required|string',
            'screen_resolution'=> 'required|string|max:50',
            'minimum_ram' => 'required|string|max:50',
            'processor'=> 'required|string|max:50',
            'operating_system' => 'required|string|max:50',
            'other_programs'=> 'required|string|max:500',
            'course_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if ($request->hasFile('course_img')) {
            $filename = Str::orderedUuid() . "." . $request->file('course_img')->getClientOriginalExtension();
            $request->file('course_img')->storeAs('course_images', $filename, 'course_images');

            Course::where('id', $id)->update([
                'course_name' => $request->course_name,
                'short_desc' => $request->short_desc,
                'course_desc' => $request->course_desc,
                'level'=> $request->level,
                'screen_resolution'=> $request->screen_resolution,
                'minimum_ram' => $request->minimum_ram,
                'processor'=> $request->processor,
                'operating_system' => $request->operating_system,
                'other_programs'=> $request->other_programs,
                'course_img' => $request->course_img,
                'updated_by' => Auth()->user()->id,
            ]);
            return redirect('/manager/course')->with('success', 'Course edit successfull!');
        }
        else{
            Course::where('id', $id)->update([
                'course_name' => $request->course_name,
                'short_desc' => $request->short_desc,
                'course_desc' => $request->course_desc,
                'level'=> $request->level,
                'screen_resolution'=> $request->screen_resolution,
                'minimum_ram' => $request->minimum_ram,
                'processor'=> $request->processor,
                'operating_system' => $request->operating_system,
                'other_programs'=> $request->other_programs,
                'updated_by' => Auth()->user()->id,
            ]);
            return redirect('/manager/course')->with('success', 'Course edit successfull!');
        }
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

        $user = Auth::user();
        $addTimeAndModule= [];
        $addTimeAndModule = [
            'total_time' => \DB::raw('total_time + ' . $request->material_duration),
            'total_module' => \DB::raw('total_module + 1'),
            'updated_by' => $user->id,

        ];
        Course::where('id', $createMaterial->course_id)->update($addTimeAndModule);

        $sidebarCount = Sidebar::where('course_id', $id)->count();

        $newSidebar = new Sidebar();
        $newSidebar->title = $createMaterial->title;
        $newSidebar->course_id = $id;
        $newSidebar->material_id = $material_id;
        $newSidebar->order = ($sidebarCount > 0) ? Sidebar::where('course_id', $id)->max('order') + 1 : 1;
        $newSidebar->path = '';
        $newSidebar->save();

        $updateLastAccessedMats = UserCourseDetail::firstOrNew(['course_id' => $id]);

        // Periksa apakah last_accessed_material belum diatur (0)



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
        $type_list = MasterType::all();
        return view('administrator.admin_courses.admin_course_session', ['material'=>$material, 'assignment_questions'=>$assignment_questions, 'final_test_questions'=>$final_test_questions,'type_list'=>$type_list]);
        // dd($material);
    }

    public function editMaterialPOST(Request $request, $id){
        $user = Auth::user();
        $material = Material::find($id);
        $course = Course::find($material->course_id);
        $validateMaterialData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'material_duration' => 'required|numeric',
        ]);
        $differenceTime = $request->material_duration-$material->material_duration;
        $editTime = [
            'total_time' => \DB::raw('total_time + ' . $differenceTime),
        ];
        Course::where('id', $material->course_id)->update($editTime);
        // dd($getCurrentMaterial->course_id);
        $changeMaterialData = [];

        $changeMaterialData += [
            'title'=> $validateMaterialData['title'],
            'description'=> $validateMaterialData['description'],
            'master_type_id' => $request->master_type_id,
            'material_duration'=>$validateMaterialData['material_duration'],
        ];
        $editUpdatedBy = [
            'updated_by' => $user->id,
        ];
        Course::where('id', $material->course_id)->update($editUpdatedBy);

        // $updateLastAccessedMats = UserCourseDetail::where(['course_id' => $getCurrentMaterial->course_id])->get();

        // dd($updateLastAccessedMats);
        // Periksa apakah last_accessed_material belum diatur (0)
        // if ($updateLastAccessedMats) {
        //     if($updateLastAccessedMats->last_accessed_material == 0){
        //         $updateLastAccessedMats->last_accessed_material = $id;
        //         $updateLastAccessedMats->save();
        //     }
        //     // Set last_accessed_material ke $material_id
        //     // Simpan perubahan
        // }
        // else{
        //     $user = auth()->user();
        //     $userCourseDetail = new UserCourseDetail([
        //                     'user_id' => $user->id,
        //                     'course_id' => $id,
        //                     'last_accessed_material' => $id,
        //                 ]);
        //     $userCourseDetail->save();
        // }

        Material::where('id', $id)->update($changeMaterialData);
        $getUpdatedMaterial = Material::where('id', $id)->first();
        if($getUpdatedMaterial->materialContentToMasterType->master_type_name == "PDF"){
             Sidebar::where('material_id', $id)->update([
                'title' => $getUpdatedMaterial->title,
                'path' => '/courses/materialContent/pdf',
             ]);
        }
        if($getUpdatedMaterial->materialContentToMasterType->master_type_name == "Video"){
            Sidebar::where('material_id', $id)->update([
               'title' => $getUpdatedMaterial->title,
               'path' => '/courses/materialContent/video',
            ]);
       }
       if($getUpdatedMaterial->materialContentToMasterType->master_type_name == "Assignment"){
            Sidebar::where('material_id', $id)->update([
                'title' => $getUpdatedMaterial->title,
                'path' => '/courses/materialContent/assignment',
            ]);
        }
        if($getUpdatedMaterial->materialContentToMasterType->master_type_name == "Final Test"){
            Sidebar::where('material_id', $id)->update([
                'title' => $getUpdatedMaterial->title,
                'path' => '/courses/materialContent/finaltest',
            ]);
        }

        return Redirect::to("/manager/course/session/{$id}/edit");
        // dd($changeMaterialData);
    }

    public function editMaterialDetail(Request $request, $id){
        $material = Material::find($id);
        if($material->materialContentToMasterType->master_type_name == 'Video'){
            $rules = [
                'video_link'=>'required|string',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            else{
                $changeMaterialDetail = [];

                $changeMaterialDetail += [
                    'video_link'=> $request->video_link,
                ];
                Material::where('id', $id)->update($changeMaterialDetail);
                return Redirect::to("/manager/course/materiallist/{$material->materialToCourse->id}");
            }

        }
        if($material->materialContentToMasterType->master_type_name == 'PDF'){
            $rules = [
                'pdf_link' => 'required|file|mimes:pdf|max:2048',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            else{
                $filename = Str::orderedUuid() . '.' . $request->file('pdf_link')->getClientOriginalExtension();
                $request->file('pdf_link')->storeAs('material_pdf', $filename, 'material_pdf');

                $changeMaterialDetail = [
                    'pdf_link' => $filename,
                ];
                try {
                    Material::where('id', $id)->update($changeMaterialDetail);
                } catch (\Exception $e) {
                    // Tangani kesalahan (contoh: log kesalahan, kembalikan tanggapan kesalahan)
                    Log::error('Error updating material: ' . $e->getMessage());

                    return redirect()->back()->with('error', 'Failed to update material. Please try again.');
                }
                return Redirect::to("/manager/course/materiallist/{$material->materialToCourse->id}");
            }

        }
        if($material->materialContentToMasterType->master_type_name == 'Assignment' || $material->materialContentToMasterType->master_type_name == 'Final Test'){
            Log::info('Request Data:', $request->all());

            // dd($request);
            $validateAssignment = $request->validate([
                'detailed_description' => 'required|string|max:300',
                'minimum_score'=>'required|integer|max:100',
                'total_questions'=>'required|integer',
            ]);
            $changeMaterialDetail = [];
            if($material->materialContentToMasterType->master_type_name == 'Assignment'){
                $questionList = AssignmentQuestions::where('material_id',$id)->get()->count();
            }
            else{
                $questionList = FinalTestQuestions::where('material_id',$id)->get()->count();
            }

            // dd($questionList);
            if($validateAssignment['total_questions'] <= $questionList){
                $changeMaterialDetail += [
                    'detailed_description'=> $validateAssignment['detailed_description'],
                    'minimum_score'=> $validateAssignment['minimum_score'],
                    'total_questions'=> $validateAssignment['total_questions'],
                ];
                // dd($changeMaterialDetail);
                Material::where('id', $id)->update($changeMaterialDetail);
                return Redirect::to("/manager/course/session/{$id}/edit");
            }
            else{
                return redirect()->back()->withErrors(['total_questions' => 'Jumlah soal harus lebih sedikit dari list pertanyaan']);
            }

        }
    }
    public function deleteMaterial($id){
        $material = Material::find($id);
        $decreaseTimeAndModule= [];
        $user = Auth::user();
        $decreaseTimeAndModule = [
            'total_time' => \DB::raw('total_time - ' . $material->material_duration),
            'total_module' => \DB::raw('total_module - 1'),
            'updated_by' => $user->id,

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
        $material = Material::find($id);
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
        if($material->total_questions == 0){
            $addTotalQuestions = [];
            $addTotalQuestions = [
                'total_questions' => \DB::raw('total_questions + 1'),
            ];
            Material::where('id', $createAssignment->material_id)->update($addTotalQuestions);
        }

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

        if ($request->hasFile('question_img')) {
            $changeAssignment += [
                'questions'=> $validateAssignment['questions'],
                'jawaban_a'=>$validateAssignment['jawaban_a'],
                'jawaban_b'=>$validateAssignment['jawaban_b'],
                'jawaban_c'=>$validateAssignment['jawaban_c'],
                'jawaban_d'=>$validateAssignment['jawaban_d'],
                'jawaban_benar'=>$validateAssignment['jawaban_benar'],
                'question_img'=> $filename,
            ];
        }
        else{
            $changeAssignment += [
                'questions'=> $validateAssignment['questions'],
                'jawaban_a'=>$validateAssignment['jawaban_a'],
                'jawaban_b'=>$validateAssignment['jawaban_b'],
                'jawaban_c'=>$validateAssignment['jawaban_c'],
                'jawaban_d'=>$validateAssignment['jawaban_d'],
                'jawaban_benar'=>$validateAssignment['jawaban_benar'],
            ];
        }
        AssignmentQuestions::where('id', $request->assignment_id)->update($changeAssignment);

        // dd($request->assignment_id);
        // dd($request->material_id);
        return Redirect::to("/manager/course/session/{$request->material_id}/edit");
        // return redirect('/manager/course')->with('success', 'Course deleted successfully.');
    }

    public function deleteQuestion(Request $request){

        $assignment_questions = AssignmentQuestions::find($request->assignment_id);
        $material_id = $assignment_questions->questionToMaterial->id;
        $material = Material::find($material_id);
        if (!$assignment_questions) {
            return redirect()->back()->with('error', 'Assignment not found.');
        }
        if($material->total_questions == 1){
            $decreaseTotalQuestions = [];
            $decreaseTotalQuestions = [
                'total_questions' => \DB::raw('total_questions - 1'),
            ];
            Material::where('id', $material_id)->update($decreaseTotalQuestions);
        }

        $assignment_questions->delete();
        // dd($assignment_questions);
        return Redirect::to("/manager/course/session/{$material_id}/edit");
    }

    public function createFinalTestQuestions(Request $request, $id){
        $material = Material::find($id);
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
        if($material->total_questions == 0){
            $addTotalQuestions = [];
            $addTotalQuestions = [
                'total_questions' => \DB::raw('total_questions + 1'),
            ];
            Material::where('id', $createFinalTest->material_id)->update($addTotalQuestions);
        }
        // dd($createAssignment);


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
        if ($request->hasFile('question_img')) {
            $changeFinal += [
                'questions'=> $validateFinal['questions'],
                'jawaban_a'=>$validateFinal['jawaban_a'],
                'jawaban_b'=>$validateFinal['jawaban_b'],
                'jawaban_c'=>$validateFinal['jawaban_c'],
                'jawaban_d'=>$validateFinal['jawaban_d'],
                'jawaban_benar'=>$validateFinal['jawaban_benar'],
                'question_img'=> $filename,
            ];
        }
        else{
            $changeFinal += [
                'questions'=> $validateFinal['questions'],
                'jawaban_a'=>$validateFinal['jawaban_a'],
                'jawaban_b'=>$validateFinal['jawaban_b'],
                'jawaban_c'=>$validateFinal['jawaban_c'],
                'jawaban_d'=>$validateFinal['jawaban_d'],
                'jawaban_benar'=>$validateFinal['jawaban_benar'],
            ];
        }
        FinalTestQuestions::where('id', $request->final_test_id)->update($changeFinal);

        // dd($request->assignment_id);
        // dd($request->material_id);
        return Redirect::to("/manager/course/session/{$request->material_id}/edit");
        // return redirect('/manager/course')->with('success', 'Course deleted successfully.');
    }
    public function deleteFinalTestQuestion(Request $request){
        $final_test_questions = FinalTestQuestions::find($request->final_test_id);
        $material_id = $final_test_questions->questionToMaterial->id;
        $material = Material::find($material_id);
        if (!$final_test_questions) {
            return redirect()->back()->with('error', 'Assignment not found.');
        }
        if($material->total_questions == 1){
            $decreaseTotalQuestions = [];
            $decreaseTotalQuestions = [
                'total_questions' => \DB::raw('total_questions - 1'),
            ];
            Material::where('id', $material_id)->update($decreaseTotalQuestions);
        }

        $final_test_questions->delete();
        // dd($assignment_questions);
        return Redirect::to("/manager/course/session/{$material_id}/edit");
    }

}
