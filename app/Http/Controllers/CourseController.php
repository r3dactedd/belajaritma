<?php

namespace App\Http\Controllers;

use App\Models\AssignmentQuestions;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\FinalTestQuestions;
use App\Models\ModuleContent;
use App\Models\Material;
use App\Models\MaterialCompleted;
use App\Models\Sidebar;
use App\Models\UserAnswerAssignment;
use App\Models\UserAnswerFinalTest;
use App\Models\UserCourseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;


class CourseController extends Controller
{
    //
    public function showData(Request $request)
    {
        $searchKeyword = $request->input('searchKeyword');

        $query = Course::where('ready_for_publish', 1);

        if ($searchKeyword) {
            $query->where('course_name', 'like', "%$searchKeyword%");
        }

        $data = $query->get();

        $data = $data->map(function ($course) {
            $course->course_img_url = asset('uploads/course_images/' . $course->course_img);
            return $course;
        });

        return view('contents.courses', compact('data'));
    }

    public function courseDetail($id)
    {
        $data = Course::find($id);
        $material = Material::where('course_id', $id)->get();
        $contentArray = [];
        $userCourseDetail = UserCourseDetail::where('user_id', auth()->id())->where('course_id', $id)->first();

        foreach ($material as $materials) {
            $contentArray[$materials->id] = ModuleContent::where('material_id', $materials->id)->get();
        }
        return view('contents.course_details', ['data' => $data, 'material' => $material, 'contentArray' => $contentArray, 'userCourseDetail' => $userCourseDetail]);
        // dd($contentArray);
    }

    public function materialDetail($title, $id, $material_id)
    {
        $data = Material::find($id);
        return view('contents.session_assignment_test', ['data' => $data]);
        // dd($contentArray);
    }

    public function courseTestPage($title, $id, $material_id, $question_id, $type)
    {
        if ($type == "finalTest") {
            $questionDetail = FinalTestQuestions::find($question_id);
            $questionList = FinalTestQuestions::where('material_id', $material_id)->get();
            $totalQuestions = count($questionList);
            $firstQuestion = FinalTestQuestions::where('material_id', $material_id)->first();
            $currentQuestionNumber = $question_id - $firstQuestion->id + 1;
            $currentQuestionNumber = ($currentQuestionNumber % $totalQuestions);
            $currentQuestionNumber = ($currentQuestionNumber == 0) ? $totalQuestions : $currentQuestionNumber;
            $latestQuestion = FinalTestQuestions::where('material_id', $material_id)->orderBy('id', 'desc')->first();
        }
        if ($type == "assignment") {
            $questionDetail = AssignmentQuestions::find($question_id);
            $questionList = AssignmentQuestions::where('material_id', $material_id)->get();
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
        return view('contents.assignment_test_questions', ['title' => $title, 'questionDetail' => $questionDetail, 'material' => $material, 'questionList' => $questionList, 'currentQuestionNumber' => $currentQuestionNumber, 'question_id' => $question_id, 'id' => $id, 'material_id' => $material_id, 'type' => $type, 'latestQuestion' => $latestQuestion, 'firstQuestion' => $firstQuestion]);
    }
    // public function saveAnswer(Request $request, $title, $id, $material_id, $question_id, $type)
    // {
    //     $user = Auth::user();
    //     UserAnswer::create([
    //         'user_id' => $user->id,
    //         'question_id' => $question_id,
    //         'selected_answer' => $request->selectedAnswer,
    //         'type' => '', // Adjust the type as needed
    //     ]);
    //     dd($request->selectedAnswer);

    // }

    public function submitAnswers(Request $request){
        Log::info('Submit Answers Request:', $request->all());
        // Validasi request jika diperlukan
        $user = Auth::user();
        if (!$user) {
            // Handle the case where the user is not authenticated
            return redirect()->route('login'); // Redirect to the login page or another appropriate action
        }

        $submissionData = $request->only(['answers', 'courseId', 'materialId']);

        $userAnswers = $request->input('answers');
        $userId = $user->id; // Mendapatkan ID pengguna yang sedang login
        $courseId = $request->filled('courseId') ? $request->input('courseId') : null;
        $materialId = $request->filled('materialId') ? $request->input('materialId') : null;
        $material = Material::findOrFail($materialId);
        if($material->materialContentToMasterType->master_type_name ==  "Assignment"){
            if (is_array($userAnswers)) {
                // Proses simpan jawaban ke dalam database atau lakukan tindakan lainnya sesuai kebutuhan
                foreach ($userAnswers as $answer) {
                    $questionId = $answer['questionId'];
                    $selectedAnswer = $answer['answer'];

                    $existingAnswer = UserAnswerAssignment::where([
                        'user_id' => $userId,
                        'question_id' => $questionId,
                        'type' => 'Assignment', // Adjust the type as needed
                    ])->first();

                    if ($existingAnswer) {
                        // Jika jawaban sudah ada, update jawaban yang ada
                        $existingAnswer->update([
                            'selected_answer' => $selectedAnswer,
                        ]);
                    } else {
                        // Jika jawaban belum ada, tambahkan jawaban baru ke database
                        UserAnswerAssignment::create([
                            'user_id' => $userId,
                            'question_id' => $questionId,
                            'selected_answer' => $selectedAnswer,
                            'type' => 'Assignment', // Adjust the type as needed
                        ]);
                    }
                }
            }
        }

        if($material->materialContentToMasterType->master_type_name ==  "Final Test"){
            if (is_array($userAnswers)) {
                // Proses simpan jawaban ke dalam database atau lakukan tindakan lainnya sesuai kebutuhan
                foreach ($userAnswers as $answer) {
                    $questionId = $answer['questionId'];
                    $selectedAnswer = $answer['answer'];

                    $existingAnswer = UserAnswerFinalTest::where([
                        'user_id' => $userId,
                        'question_id' => $questionId,
                        'type' => 'Final Test', // Adjust the type as needed
                    ])->first();

                    if ($existingAnswer) {
                        // Jika jawaban sudah ada, update jawaban yang ada
                        $existingAnswer->update([
                            'selected_answer' => $selectedAnswer,
                        ]);
                    } else {
                        // Jika jawaban belum ada, tambahkan jawaban baru ke database
                        UserAnswerFinalTest::create([
                            'user_id' => $userId,
                            'question_id' => $questionId,
                            'selected_answer' => $selectedAnswer,
                            'type' => 'Final Test', // Adjust the type as needed
                        ]);
                    }
                }
            }
        }

            return redirect()->route('course.showResults', [$courseId, $materialId]);
    }


    public function showAssignmentResults($courseId, $materialId){
        $sidebars = Sidebar::select('sidebar.id', 'sidebar.material_id', 'sidebar.parent_id', 'sidebar.title', 'sidebar.course_id', 'sidebar.is_locked')
            ->where('course_id', $courseId)
            ->orderBy('order')
            ->get();

        // Find the current material in the sorted sidebar list
        $currentMaterialIndex = $sidebars->search(function ($item) use ($materialId) {
            return $item->material_id == $materialId;
        });

        // Determine the previous and next material
        $currentMaterial = $sidebars[$currentMaterialIndex];
        $material = Material::findOrFail($materialId);
        $enrollment = Enrollment::where('user_id', auth()->id())->where('course_id', $courseId)->first();

        $course = Course::find($courseId);
        $excludeFinal = $course->total_module - 1;
        $materialCompleted = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $courseId)
            ->where('material_id', $materialId)
            ->where('enrollment_id', $enrollment->id)
            ->exists();

        if ($enrollment) {

            if($material->materialContentToMasterType->master_type_name ==  "Assignment"){
                $assignmentQuestions = AssignmentQuestions::where('material_id', $materialId)->orderBy('id', 'asc')->get();

                $userAnswers = UserAnswerAssignment::where('user_id', auth()->id())->orderBy('id', 'asc')->whereIn('question_id', $assignmentQuestions->pluck('id'))->get();

                // Calculate the user's score
                $totalQuestions = $assignmentQuestions->count();
                $correctAnswers = 0;

                foreach ($userAnswers as $userAnswer) {
                    $question = $assignmentQuestions->where('id', $userAnswer->question_id)->first();

                    // Check if the selected answer matches the correct answer
                    if ($userAnswer->selected_answer === $question->jawaban_benar) {
                        $correctAnswers++;
                    }
                }
                $userScore = ceil(($correctAnswers / $totalQuestions) * 100);

                if(!$materialCompleted){
                    MaterialCompleted::create([
                        'user_id' => auth()->id(),
                        'course_id' => $courseId,
                        'material_id' => $materialId,
                        'enrollment_id' => $enrollment->id,
                        'total_score' => $userScore,
                        'attempts' => \DB::raw('attempts + 1'),
                    ]);
                }
                else{
                    MaterialCompleted::where('material_id', $materialId)->update([
                        'total_score' => $userScore,
                        'attempts' => \DB::raw('attempts + 1'),
                    ]);
                }

                Log::info('The Answers:', [$userAnswers]);
                Log::info('The Questions:', [$assignmentQuestions]);

                if($userScore >= $material->minimum_score){
                    $enrollment->material_completed_count += 1;
                    $enrollment->total_duration_count+=$material->material_duration;
                    $enrollment->save();

                    $currentMaterial->is_locked = false;
                    $currentMaterial->save();
                }

                if ($enrollment->material_completed_count == $excludeFinal) {
                    $enrollment->ready_for_final = true;
                    $enrollment->save();
                }

                return response()->json(['message' => 'Success']);

            }

            if($material->materialContentToMasterType->master_type_name ==  "Final Test"){
                $finalTestQuestions = FinalTestQuestions::where('material_id', $materialId)->orderBy('id', 'asc')->get();

                $userAnswers = UserAnswerFinalTest::where('user_id', auth()->id())->orderBy('id', 'asc')->whereIn('question_id', $finalTestQuestions->pluck('id'))->get();

                // Calculate the user's score
                $totalQuestions = $finalTestQuestions->count();
                $correctAnswers = 0;

                foreach ($userAnswers as $userAnswer) {
                    $question = $finalTestQuestions->where('id', $userAnswer->question_id)->first();

                    // Check if the selected answer matches the correct answer
                    if ($userAnswer->selected_answer === $question->jawaban_benar) {
                        $correctAnswers++;
                    }
                }
                $userScore = ceil(($correctAnswers / $totalQuestions) * 100);
                if(!$materialCompleted){
                    MaterialCompleted::create([
                        'user_id' => auth()->id(),
                        'course_id' => $courseId,
                        'material_id' => $materialId,
                        'enrollment_id' => $enrollment->id,
                        'total_score' => $userScore,
                        'attempts' => \DB::raw('attempts + 1'),
                    ]);
                }
                else{
                    MaterialCompleted::where('material_id', $materialId)->update([
                        'total_score' => $userScore,
                        'attempts' => \DB::raw('attempts + 1'),
                    ]);
                }
                Log::info('The Answers:', [$userAnswers]);
                Log::info('The Questions:', [$finalTestQuestions]);

                if($userScore >= $material->minimum_score){
                    $enrollment->material_completed_count += 1;
                    $enrollment->total_duration_count+=$material->material_duration;
                    $enrollment->save();

                    $currentMaterial->is_locked = false;
                    $currentMaterial->save();
                }

                if ($enrollment->material_completed_count == $excludeFinal) {
                    $enrollment->ready_for_final = true;
                    $enrollment->save();
                }

                // return view('contents.assignment_test_results');
            }
        }
    }
    public function showScore($id, $material_id, $type){
        return view('contents.assignment_test_results');
    }
}
