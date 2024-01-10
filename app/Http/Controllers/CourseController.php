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
use Carbon\Carbon;
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
        $finalMaterial = $material->where('master_type_id', 4)->first();
        $firstIndexFIN = FinalTestQuestions::where('material_id', $finalMaterial->id)->first();
        // dd($finalMaterial);
        $contentArray = [];
        $userCourseDetail = UserCourseDetail::where('user_id', auth()->id())->where('course_id', $id)->first();
        $materialAccessed = null;
        $enrollment = Enrollment::where('user_id', auth()->id())->where('course_id', $id)->first();
        $checkFinalComplete =null;
        if($enrollment){
            $checkFinalComplete = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $id)
                ->where('material_id', $finalMaterial->id)
                ->where('enrollment_id', $enrollment->id)
                ->exists();
            $materialAccessed = Material::where('id', $userCourseDetail->last_accessed_material)->first();
        }
        foreach ($material as $materials) {
            $contentArray[$materials->id] = ModuleContent::where('material_id', $materials->id)->get();
        }
        return view('contents.course_details', ['data' => $data, 'material' => $material, 'contentArray' => $contentArray, 'userCourseDetail' => $userCourseDetail, 'checkFinalComplete' => $checkFinalComplete, 'firstIndexFIN' => $firstIndexFIN, 'materialAccessed'=> $materialAccessed]);
        // dd($contentArray);
    }

    public function materialDetail($title, $id, $material_id)
    {
        $data = Material::find($id);
        return view('contents.session_assignment_test', ['data' => $data]);
        // dd($contentArray);
    }

    public function courseTestPage($title, $id, $material_id, $question_id, $type, $isReshuffle)
    {
        if ($type == "finalTest") {
            $questionList = FinalTestQuestions::where('material_id', $material_id)->get();

            // Shuffle and store question IDs in the session
            if ($isReshuffle == 1) {
                $shuffledQuestionIds = $questionList->pluck('id')->shuffle()->toArray();

                // Ensure that the first question after shuffling is the same as firstRandomQuestionId
                $firstQuestionIndex = array_search($question_id, $shuffledQuestionIds);

                // If the firstRandomQuestionId is not in the list, add it to the beginning
                if ($firstQuestionIndex === false) {
                    array_unshift($shuffledQuestionIds, $question_id);
                } else {
                    // Swap the first question with the question at the firstRandomQuestionId index
                    list($shuffledQuestionIds[0], $shuffledQuestionIds[$firstQuestionIndex]) =
                        [$shuffledQuestionIds[$firstQuestionIndex], $shuffledQuestionIds[0]];
                }

                session(['shuffledQuestionIds' => $shuffledQuestionIds, 'reshuffled' => true]);
            } else {
                // If not set, shuffle and store in the session
                if (!session()->has('shuffledQuestionIds')) {
                    $shuffledQuestionIds = $questionList->pluck('id')->shuffle()->toArray();
                    session(['shuffledQuestionIds' => $shuffledQuestionIds]);
                } else {
                    $shuffledQuestionIds = session('shuffledQuestionIds');
                }
            }


            $currentQuestionIndex = array_search($question_id, $shuffledQuestionIds);

            // Determine the next and previous question IDs
            $nextQuestionId = $shuffledQuestionIds[($currentQuestionIndex + 1) % count($shuffledQuestionIds)];
            $previousQuestionId = $shuffledQuestionIds[($currentQuestionIndex - 1 + count($shuffledQuestionIds)) % count($shuffledQuestionIds)];

            $firstQuestionId = $shuffledQuestionIds[0];
            $firstQuestion = FinalTestQuestions::find($firstQuestionId);
            // Check if the current question is the last one in the shuffled order

            $isLastQuestion = ($currentQuestionIndex + 1) == count($shuffledQuestionIds);

            // Fetch the question details based on the shuffled order
            $shuffledQuestionId = $shuffledQuestionIds[$currentQuestionIndex];
            $questionDetail = FinalTestQuestions::find($shuffledQuestionId);

            // Calculate the current question number based on the shuffled order
            $currentQuestionNumber = $currentQuestionIndex + 1;
            $latestQuestion = FinalTestQuestions::where('material_id', $material_id)->orderBy('id', 'desc')->first();
        }
        if ($type == "assignment") {
            $questionList = AssignmentQuestions::where('material_id', $material_id)->get();

            // Shuffle and store question IDs in the session
            if ($isReshuffle == 1) {
                $shuffledQuestionIds = $questionList->pluck('id')->shuffle()->toArray();

                // Ensure that the first question after shuffling is the same as firstRandomQuestionId
                $firstQuestionIndex = array_search($question_id, $shuffledQuestionIds);

                // If the firstRandomQuestionId is not in the list, add it to the beginning
                if ($firstQuestionIndex === false) {
                    array_unshift($shuffledQuestionIds, $question_id);
                } else {
                    // Swap the first question with the question at the firstRandomQuestionId index
                    list($shuffledQuestionIds[0], $shuffledQuestionIds[$firstQuestionIndex]) =
                        [$shuffledQuestionIds[$firstQuestionIndex], $shuffledQuestionIds[0]];
                }

                session(['shuffledQuestionIds' => $shuffledQuestionIds, 'reshuffled' => true]);
            } else {
                // If not set, shuffle and store in the session
                if (!session()->has('shuffledQuestionIds')) {
                    $shuffledQuestionIds = $questionList->pluck('id')->shuffle()->toArray();
                    session(['shuffledQuestionIds' => $shuffledQuestionIds]);
                } else {
                    $shuffledQuestionIds = session('shuffledQuestionIds');
                }
            }


            $currentQuestionIndex = array_search($question_id, $shuffledQuestionIds);

            // Determine the next and previous question IDs
            $nextQuestionId = $shuffledQuestionIds[($currentQuestionIndex + 1) % count($shuffledQuestionIds)];
            $previousQuestionId = $shuffledQuestionIds[($currentQuestionIndex - 1 + count($shuffledQuestionIds)) % count($shuffledQuestionIds)];

            $firstQuestionId = $shuffledQuestionIds[0];
            $firstQuestion = AssignmentQuestions::find($firstQuestionId);
            // Check if the current question is the last one in the shuffled order

            $isLastQuestion = ($currentQuestionIndex + 1) == count($shuffledQuestionIds);

            // Fetch the question details based on the shuffled order
            $shuffledQuestionId = $shuffledQuestionIds[$currentQuestionIndex];
            $questionDetail = AssignmentQuestions::find($shuffledQuestionId);

            // Calculate the current question number based on the shuffled order
            $currentQuestionNumber = $currentQuestionIndex + 1;
            $latestQuestion = AssignmentQuestions::where('material_id', $material_id)->orderBy('id', 'desc')->first();
        }

        $material = Material::where('id', $material_id)->first();
        // dd($material_id);
        // dd($question_id);
        // dd($type);
        // dd($material);
        //  dd($latestQuestion->id);
        return view('contents.assignment_test_questions', ['currentQuestionIndex' => $currentQuestionIndex, 'shuffledQuestionIds' => $shuffledQuestionIds, 'currentQuestionNumber' => $currentQuestionNumber, 'nextQuestionId' => $nextQuestionId, 'previousQuestionId' => $previousQuestionId, 'title' => $title, 'questionDetail' => $questionDetail, 'material' => $material, 'questionList' => $questionList, 'currentQuestionNumber' => $currentQuestionNumber, 'question_id' => $question_id, 'id' => $id, 'material_id' => $material_id, 'type' => $type, 'latestQuestion' => $latestQuestion, 'isLastQuestion' => $isLastQuestion, 'firstQuestion' => $firstQuestion]);
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

    public function submitAnswers(Request $request)
    {
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
        if ($material->materialContentToMasterType->master_type_name ==  "Assignment") {
            if (is_array($userAnswers)) {
                // Proses simpan jawaban ke dalam database atau lakukan tindakan lainnya sesuai kebutuhan
                foreach ($userAnswers as $answer) {
                    $questionId = $answer['questionId'];
                    $selectedAnswer = $answer['answer'];
                    $answerDetail = $answer['answerDetail'];

                    $existingAnswer = UserAnswerAssignment::where([
                        'user_id' => $userId,
                        'question_id' => $questionId,
                        'type' => 'Assignment', // Adjust the type as needed
                    ])->first();

                    if ($existingAnswer) {
                        // Jika jawaban sudah ada, update jawaban yang ada
                        $existingAnswer->update([
                            'selected_answer' => $selectedAnswer,
                            'answer_detail' => $answerDetail,
                        ]);
                    } else {
                        // Jika jawaban belum ada, tambahkan jawaban baru ke database
                        UserAnswerAssignment::create([
                            'user_id' => $userId,
                            'question_id' => $questionId,
                            'selected_answer' => $selectedAnswer,
                            'answer_detail' => $answerDetail,
                            'type' => 'Assignment', // Adjust the type as needed
                        ]);
                    }
                }
            }
        }

        if ($material->materialContentToMasterType->master_type_name ==  "Final Test") {
            if (is_array($userAnswers)) {
                // Proses simpan jawaban ke dalam database atau lakukan tindakan lainnya sesuai kebutuhan
                foreach ($userAnswers as $answer) {
                    $questionId = $answer['questionId'];
                    $selectedAnswer = $answer['answer'];
                    $answerDetail = $answer['answerDetail'];
                    $existingAnswer = UserAnswerFinalTest::where([
                        'user_id' => $userId,
                        'question_id' => $questionId,
                        'type' => 'Final Test', // Adjust the type as needed
                    ])->first();

                    if ($existingAnswer) {
                        // Jika jawaban sudah ada, update jawaban yang ada
                        $existingAnswer->update([
                            'selected_answer' => $selectedAnswer,
                            'answer_detail' => $answerDetail,
                        ]);
                    } else {
                        // Jika jawaban belum ada, tambahkan jawaban baru ke database
                        UserAnswerFinalTest::create([
                            'user_id' => $userId,
                            'question_id' => $questionId,
                            'selected_answer' => $selectedAnswer,
                            'answer_detail' => $answerDetail,
                            'type' => 'Final Test', // Adjust the type as needed
                        ]);
                    }
                }
            }
        }

        return redirect()->route('course.showResults', [$courseId, $materialId]);
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

        // Determine the previous and next material
        $currentMaterial = $sidebars[$currentMaterialIndex];
        $material = Material::findOrFail($materialId);
        $nextMaterial = $sidebars[$currentMaterialIndex + 1] ?? null;
        $enrollment = Enrollment::where('user_id', auth()->id())->where('course_id', $courseId)->first();

        $course = Course::find($courseId);
        $excludeFinal = $course->total_module - 1;
        $materialCompleted = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $courseId)
            ->where('material_id', $materialId)
            ->where('enrollment_id', $enrollment->id)
            ->exists();
        $findMaterialCompleted = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $courseId)
            ->where('material_id', $materialId)
            ->where('enrollment_id', $enrollment->id)
            ->first();

        if ($enrollment) {

            if ($material->materialContentToMasterType->master_type_name ==  "Assignment") {
                $assignmentQuestions = AssignmentQuestions::where('material_id', $materialId)->orderBy('id', 'asc')->get();

                $userAnswers = UserAnswerAssignment::where('user_id', auth()->id())->orderBy('id', 'asc')->whereIn('question_id', $assignmentQuestions->pluck('id'))->get();

                // Calculate the user's score
                $totalQuestions = $assignmentQuestions->count();
                $correctAnswers = 0;
                $counter = 0;

                foreach ($userAnswers as $userAnswer) {
                    $question = $assignmentQuestions->where('id', $userAnswer->question_id)->first();

                    // Check if the selected answer matches the correct answer
                    if ($userAnswer->selected_answer === $question->jawaban_benar) {
                        $userAnswer->is_correct = true;
                        $userAnswer->save();
                        $correctAnswers++;
                    } else {
                        $userAnswer->is_correct = false;
                        $userAnswer->save();
                    }
                    $counter++;
                    if ($counter >= $totalQuestions) {
                        break;  // Exit the loop if the counter reaches 25
                    }
                }
                $userScore = ceil(($correctAnswers / $totalQuestions) * 100);

                if (!$materialCompleted) {
                    MaterialCompleted::create([
                        'user_id' => auth()->id(),
                        'course_id' => $courseId,
                        'material_id' => $materialId,
                        'enrollment_id' => $enrollment->id,
                        'total_score' => $userScore,
                        'attempts' => \DB::raw('attempts + 1'),
                    ]);
                } else {
                    MaterialCompleted::where('material_id', $materialId)->update([
                        'total_score' => $userScore,
                        'attempts' => \DB::raw('attempts + 1'),
                    ]);
                }


                Log::info('The Answers:', [$userAnswers]);
                Log::info('The Questions:', [$assignmentQuestions]);

                if ($userScore >= $material->minimum_score) {
                    $enrollment->material_completed_count += 1;
                    $enrollment->total_duration_count += $material->material_duration;
                    $enrollment->save();

                    $currentMaterial->is_locked = false;
                    $currentMaterial->save();

                    $nextMaterial->is_visible = true;
                    $nextMaterial->save();
                }

                if ($enrollment->material_completed_count == $excludeFinal) {
                    $enrollment->ready_for_final = true;
                    $enrollment->save();
                }

                return response()->json(['message' => 'Success']);
            }

            if ($material->materialContentToMasterType->master_type_name ==  "Final Test") {
                $finalTestQuestions = FinalTestQuestions::where('material_id', $materialId)->orderBy('id', 'asc')->get();

                $userAnswers = UserAnswerFinalTest::where('user_id', auth()->id())->orderBy('id', 'asc')->whereIn('question_id', $finalTestQuestions->pluck('id'))->get();

                // Calculate the user's score
                $totalQuestions = $finalTestQuestions->count();
                $correctAnswers = 0;
                $counter = 0;
                foreach ($userAnswers as $userAnswer) {
                    $question = $finalTestQuestions->where('id', $userAnswer->question_id)->first();

                    // Check if the selected answer matches the correct answer
                    if ($userAnswer->selected_answer === $question->jawaban_benar) {
                        $userAnswer->is_correct = true;
                        $userAnswer->save();
                        $correctAnswers++;
                    } else {
                        $userAnswer->is_correct = false;
                        $userAnswer->save();
                    }
                    $counter++;
                    if ($counter >= $totalQuestions) {
                        break;  // Exit the loop if the counter reaches 25
                    }
                }
                $userScore = ceil(($correctAnswers / $totalQuestions) * 100);
                if (!$materialCompleted) {
                    MaterialCompleted::create([
                        'user_id' => auth()->id(),
                        'course_id' => $courseId,
                        'material_id' => $materialId,
                        'enrollment_id' => $enrollment->id,
                        'total_score' => $userScore,
                        'attempts' => \DB::raw('attempts + 1'),
                    ]);
                } else {
                    MaterialCompleted::where('material_id', $materialId)->update([
                        'total_score' => $userScore,
                        'attempts' => \DB::raw('attempts + 1'),
                    ]);
                }


                Log::info('The Answers:', [$userAnswers]);
                Log::info('The Questions:', [$finalTestQuestions]);

                if ($userScore >= $material->minimum_score) {
                    $enrollment->material_completed_count += 1;
                    $enrollment->total_duration_count += $material->material_duration;
                    $enrollment->completed = true;
                    $enrollment->save();

                    $currentMaterial->is_locked = false;
                    $currentMaterial->save();
                }

                if ($enrollment->material_completed_count == $excludeFinal) {
                    $enrollment->ready_for_final = true;
                    $enrollment->save();
                }
                return response()->json(['message' => 'Success']);
                // return view('contents.assignment_test_results');
            }
        }
    }
    public function showScore($id, $material_id, $type)
    {
        $material = Material::findOrFail($material_id);
        $course = Course::findOrFail($id);
        $sidebars = Sidebar::select('sidebar.id', 'sidebar.material_id', 'sidebar.parent_id', 'sidebar.title', 'sidebar.course_id', 'sidebar.is_locked', 'sidebar.order')
            ->where('course_id', $id)
            ->where('material_id', $material_id)
            ->orderBy('order')
            ->first();

        $enrollment = Enrollment::where('user_id', auth()->id())->where('course_id', $id)->first();
        $materialCompleted = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $id)
            ->where('material_id', $material_id)
            ->where('enrollment_id', $enrollment->id)
            ->first();
        $remainingTime = null;
        // dd($firstIndexASG->id);
        if ($type == 'assignment') {

            if ($materialCompleted->attempts == 3 && $materialCompleted->total_score < $material->minimum_score) {
                MaterialCompleted::where('material_id', $materialCompleted->material_id)->update([
                    'blocked_until' => Carbon::now()->addMinutes(30),
                    'attempts' => 0,
                ]);
                $tempMaterial = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $id)
                    ->where('material_id', $material_id)
                    ->where('enrollment_id', $enrollment->id)
                    ->first();
                $remainingTime = Carbon::now()->diffInMinutes($tempMaterial->blocked_until);
            }
            if ($materialCompleted->blocked_until) {
                $remainingTime = Carbon::now()->diffInMinutes($materialCompleted->blocked_until);
            }
            if($remainingTime == 0){
                $materialCompleted->blocked_until = null;
                $materialCompleted->save();
                $remainingTime = 0;
            }
            $firstRandomQuestion = AssignmentQuestions::where('material_id', $material_id)->inRandomOrder()->first();
            $randomizedQuestions = AssignmentQuestions::where('material_id', $material_id)->get()->shuffle();
            $questions = AssignmentQuestions::where('material_id', $material_id)->orderBy('id', 'asc')->get();
            $userAnswers = UserAnswerAssignment::where('user_id', auth()->id())->orderBy('id', 'asc')->whereIn('question_id', $questions->pluck('id'))->get();
            return view('contents.assignment_test_results', compact('userAnswers', 'questions', 'firstRandomQuestion', 'randomizedQuestions', 'remainingTime', 'sidebars', 'materialCompleted', 'material', 'course', 'material_id', 'type'));
        }
        if ($type == 'finalTest') {

            if ($materialCompleted->attempts == 1 && $materialCompleted->total_score < $material->minimum_score) {
                MaterialCompleted::where('material_id', $materialCompleted->material_id)->update([
                    'blocked_until' => Carbon::now()->addDay(1),
                    'attempts' => 0,
                ]);
                $tempMaterial = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $id)
                    ->where('material_id', $material_id)
                    ->where('enrollment_id', $enrollment->id)
                    ->first();
                $remainingTime = Carbon::now()->diffInMinutes($tempMaterial->blocked_until);
            }
            if ($materialCompleted->blocked_until) {
                $remainingTime = Carbon::now()->diffInMinutes($materialCompleted->blocked_until);
            }
            if($remainingTime == 0){
                $materialCompleted->blocked_until = null;
                $materialCompleted->save();
                $remainingTime = 0;
            }
            $firstRandomQuestion = FinalTestQuestions::where('material_id', $material_id)->inRandomOrder()->first();
            $randomizedQuestions = FinalTestQuestions::where('material_id', $material_id)->get()->shuffle();
            $questions = FinalTestQuestions::where('material_id', $material_id)->orderBy('id', 'asc')->get();
            $userAnswers = UserAnswerFinalTest::where('user_id', auth()->id())->orderBy('id', 'asc')->whereIn('question_id', $questions->pluck('id'))->get();
            return view('contents.assignment_test_results', compact('userAnswers', 'questions','firstRandomQuestion', 'randomizedQuestions', 'remainingTime', 'sidebars', 'materialCompleted', 'material', 'course', 'material_id', 'type'));
        }
    }

    protected function blockUserFor30Minutes($materialCompleted)
    {
        MaterialCompleted::where('material_id', $materialCompleted->material_id)->update([
            'blocked_until' => Carbon::now()->addMinutes(30),
            'attempts' => 0,
        ]);
    }

    protected function blockUserForADay($materialCompleted)
    {
        MaterialCompleted::where('material_id', $materialCompleted->material_id)->update([
            'blocked_until' => Carbon::now()->addDay(1),
            'attempts' => 0,
        ]);
    }
}
