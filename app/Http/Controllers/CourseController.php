<?php

namespace App\Http\Controllers;

use App\Models\AssignmentQuestions;
use App\Models\Course;
use App\Models\FinalTestQuestions;
use App\Models\ModuleContent;
use App\Models\Material;
use App\Models\UserCourseDetail;
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
        $userCourseDetail = UserCourseDetail::where('user_id', auth()->id())->where('course_id', $id)->first();

        foreach ($material as $materials) {
            $contentArray[$materials->id] = ModuleContent::where('material_id', $materials->id)->get();
        }
        return view('contents.course_details', ['data' => $data, 'material' => $material, 'contentArray' => $contentArray, 'userCourseDetail'=> $userCourseDetail]);
        // dd($contentArray);
    }

    public function materialDetail($title,$id, $material_id){
        $data=Material::find($id);
        return view('contents.session_assignment_test', ['data' => $data]);
        // dd($contentArray);
    }

    public function courseTestPage ($title,$id, $material_id,$question_id,$type){
        if($type == "finalTest"){
            $questionDetail= FinalTestQuestions::find($question_id);
            $questionList= FinalTestQuestions::where('material_id', $material_id)->get();
            $totalQuestions = count($questionList);
            $firstQuestion = FinalTestQuestions::where('material_id', $material_id)->first();
            $currentQuestionNumber = $question_id - $firstQuestion->id + 1;
            $currentQuestionNumber = ($currentQuestionNumber % $totalQuestions);
            $currentQuestionNumber = ($currentQuestionNumber == 0) ? $totalQuestions : $currentQuestionNumber;
            $latestQuestion = FinalTestQuestions::where('material_id', $material_id)->orderBy('id', 'desc')->first();
        }
        if($type == "assignment"){
            $questionDetail= AssignmentQuestions::find($question_id);
            $questionList= AssignmentQuestions::where('material_id', $material_id)->get();
            $totalQuestions = count($questionList);
            $firstQuestion = AssignmentQuestions::where('material_id', $material_id)->first();
            $currentQuestionNumber = $question_id - $firstQuestion->id + 1;
            $currentQuestionNumber = ($currentQuestionNumber % $totalQuestions);
            $currentQuestionNumber = ($currentQuestionNumber == 0) ? $totalQuestions : $currentQuestionNumber;
            $latestQuestion = AssignmentQuestions::where('material_id', $material_id)->orderBy('id', 'desc')->first();
        }

        $material = Material::where('id', $material_id)->first();
        // dd($material_id);
        // dd($question_id);
        // dd($type);
        // dd($material);
        //  dd($latestQuestion->id);
        return view('contents.assignment_test_questions', ['title'=>$title, 'questionDetail' => $questionDetail,'material'=>$material, 'questionList'=>$questionList, 'currentQuestionNumber'=>$currentQuestionNumber, 'question_id'=>$question_id, 'id'=>$id, 'material_id'=>$material_id,'type'=>$type, 'latestQuestion'=>$latestQuestion, 'firstQuestion'=>$firstQuestion]);
    }

}
