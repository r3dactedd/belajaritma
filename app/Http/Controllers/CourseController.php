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
use App\Models\UserAnswer;
use App\Models\UserCourseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    //
    public function showData(Request $request)
    {
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

    public function submitAnswers(Request $request)
    {
        // Validasi request jika diperlukan
        $user = Auth::user();
        if (!$user) {
            // Handle the case where the user is not authenticated
            return redirect()->route('login'); // Redirect to the login page or another appropriate action
        }

        $submissionData = $request->only(['answers', 'courseId', 'materialId']);

        // Extract answers, courseId, and materialId from submissionData
        $userAnswers = $request->input('answers');
        $userId = $user->id; // Mendapatkan ID pengguna yang sedang login
        $courseId = $request->filled('courseId') ? $request->input('courseId') : null;
        $materialId = $request->filled('materialId') ? $request->input('materialId') : null;

        if (is_array($userAnswers)) {
            // Proses simpan jawaban ke dalam database atau lakukan tindakan lainnya sesuai kebutuhan
            foreach ($userAnswers as $answer) {
                $questionId = $answer['questionId'];
                $selectedAnswer = $answer['answer'];

                $existingAnswer = UserAnswer::where([
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
                    UserAnswer::create([
                        'user_id' => $userId,
                        'question_id' => $questionId,
                        'selected_answer' => $selectedAnswer,
                        'type' => 'Assignment', // Adjust the type as needed
                    ]);
                }
            }
        }

        // The rest of your code remains unchanged

        // if ($material) {
            return redirect()->route('course.showResults', [$courseId, $materialId]);
        // } else {
        //     // Handle the case where the material is not found
        //     // You can redirect to an error page, show a message, or take another appropriate action
        //     return redirect()->route('error.page'); // Replace 'error.page' with the appropriate route name
        // }
    }


    public function showAssignmentResults($courseId, $materialId)
    {
        $sidebars = Sidebar::select('sidebar.id', 'sidebar.material_id', 'sidebar.parent_id', 'sidebar.title', 'sidebar.course_id', 'sidebar.is_locked')
            ->where('course_id', $courseId)
            ->orderBy('order')
            ->get();

        // Find the current material in the sorted sidebar list
        $currentMaterialIndex = $sidebars->search(function ($item) use ($materialId) {
            return $item->material_id == $materialId;
        });
        $nextMaterialIndex = $currentMaterialIndex + 1;

        // Determine the previous and next material
        $currentMaterial = $sidebars[$currentMaterialIndex];
        $previousMaterial = $sidebars[$currentMaterialIndex - 1] ?? null;
        $nextMaterial = $sidebars[$currentMaterialIndex + 1] ?? null;
        $material = Material::findOrFail($materialId);
        $enrollment = Enrollment::where('user_id', auth()->id())->where('course_id', $courseId)->first();
        $findFinalSidebar = Sidebar::where('course_id', $courseId)->where('material_id', $materialId)->first();

        $course = Course::find($courseId);
        $excludeFinal = $course->total_module - 1;
        $firstIndexASG = AssignmentQuestions::where('material_id', $materialId)->first();
        $firstIndexFIN = FinalTestQuestions::where('material_id', $materialId)->first();


        if ($enrollment) {
            $materialCompleted = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $courseId)
                ->where('material_id', $materialId)
                ->where('enrollment_id', $enrollment->id)
                ->exists();

            //Kalau sudah selesai material course sebelum final (Bukan Assignment dan Bukan Final Test)
            if (
                !$materialCompleted && $enrollment->material_completed_count < $excludeFinal
                && $material->materialContentToMasterType->master_type_name !=  "Assignment" && $material->materialContentToMasterType->master_type_name != "Final Test"
            ) {
                MaterialCompleted::create([
                    'user_id' => auth()->id(),
                    'course_id' => $courseId,
                    'material_id' => $materialId,
                    'enrollment_id' => $enrollment->id,
                ]);
                $currentMaterial->is_locked = false;
                $currentMaterial->save();

                $enrollment->material_completed_count += 1;
                $enrollment->total_duration_count += $material->material_duration;
                $enrollment->save();
            }
            //Kalau total complete sudah tinggal yg final saja
            if ($enrollment->material_completed_count == $excludeFinal) {
                $enrollment->ready_for_final = true;
                $enrollment->save();
            }
        }

        if ($previousMaterial || $nextMaterial) {
            // Assuming you have a UserCourse model that represents the user's progress in a course
            // $enrollment = Enrollment::where('user_id', auth()->id())->where('course_id', $id)->first();

            if ($enrollment) {
                $userCourse = UserCourseDetail::find($enrollment->course_id);

                if ($userCourse) {
                    $userCourse->last_accessed_material = $previousMaterial ? $previousMaterial->material_id : $nextMaterial->material_id;
                    $userCourse->save();
                    // if ($nextMaterial && $nextMaterial->is_locked) {
                    //     // Unlock the next material if it is currently locked
                    //     $nextMaterial->is_locked = false;
                    //     $nextMaterial->save();
                    // }
                }
            }
        }
        // Load the corresponding material view based on the material type
        // $material = Material::findOrFail($material_id);
        $userCourseDetail = UserCourseDetail::where('user_id', auth()->id())->where('course_id', $courseId)->first();
        $userCourseDetail->last_accessed_material = $materialId;
        $userCourseDetail->save();

        return view('contents.assignment_results', compact('courseId', 'materialId', 'currentMaterialIndex', 'nextMaterial'));
    }
}
