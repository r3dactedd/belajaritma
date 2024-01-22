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
use App\Models\UserSidebarProgress;
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
        $checkFinalComplete = null;
        if ($enrollment) {
            $checkFinalComplete = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $id)
                ->where('material_id', $finalMaterial->id)
                ->where('enrollment_id', $enrollment->id)
                ->exists();
            $materialAccessed = Material::where('id', $userCourseDetail->last_accessed_material)->first();
        }
        foreach ($material as $materials) {
            $contentArray[$materials->id] = ModuleContent::where('material_id', $materials->id)->get();
        }
        return view('contents.course_details', ['data' => $data, 'material' => $material, 'contentArray' => $contentArray, 'userCourseDetail' => $userCourseDetail, 'checkFinalComplete' => $checkFinalComplete, 'firstIndexFIN' => $firstIndexFIN, 'materialAccessed' => $materialAccessed]);
        // dd($contentArray);
    }

    public function materialDetail($title, $id, $material_id)
    {
        $data = Material::find($id);
        return view('contents.session_assignment_test', ['data' => $data]);
        // dd($contentArray);
    }
    public function exitTest($id, $material_id,){
        $material = Material::where('id', $material_id)->first();
        $enrollment = Enrollment::where('user_id', auth()->id())->where('course_id', $id)->first();
        $materialCompleted = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $id)
        ->where('material_id', $material_id)
        ->where('enrollment_id', $enrollment->id)
        ->exists();
        $userCourse = UserCourseDetail::where('course_id', $id)->where('user_id',auth()->id())->first();
        $userCourse->last_accessed_material = $material_id;
        $userCourse->save();
        if (!$materialCompleted) {
            MaterialCompleted::create([
                'user_id' => auth()->id(),
                'course_id' => $id,
                'material_id' => $material_id,
                'enrollment_id' => $enrollment->id,
                'total_score' => 0,
                'attempts' => \DB::raw('attempts + 1'),
            ]);
        } else {
            MaterialCompleted::where('material_id', $material->id)->update([
                'total_score' => 0,
                'attempts' => \DB::raw('attempts + 1'),
            ]);
        }
        if($material->materialContentToMasterType->master_type_name == "Assignment"){
            $searchResult = UserAnswerAssignment::where([
                'user_id' => auth()->id(),
                'material_id' => $material_id,
                'type' => 'Assignment',
            ])->first();

            // Check if a result is found
            if ($searchResult) {
                UserAnswerAssignment::where('material_id', $material_id)
                    ->update(['question_shown' => false]);
            }
        }
        if ($material->materialContentToMasterType->master_type_name == "Final Test"){
            $searchResult = UserAnswerFinalTest::where([
                'user_id' => auth()->id(),
                'material_id' => $material_id,
                'type' => 'Final Test',
            ])->first();

            // Check if a result is found
            if ($searchResult) {
                UserAnswerFinalTest::where('material_id', $material_id)
                    ->update(['question_shown' => false]);
            }
        }

        return redirect()->action([SidebarController::class, 'showMaterial'], ['title' => $material->title, 'id' => $id, 'material_id' => $material_id]);
    }
    public function courseTestPage($title, $id, $material_id, $question_id, $type, $isReshuffle)
    {
        $totalQuestions = Material::where('id', $material_id)->first();
        if ($type == "finalTest") {
            if ($isReshuffle == 1) {
                // Retrieve all question IDs for the given material
                $allQuestionIds = FinalTestQuestions::where('material_id', $material_id)
                    ->pluck('id')->toArray();

                // Shuffle all question IDs
                shuffle($allQuestionIds);

                // Set the desired count of shuffled questions (e.g., 5)
                $shuffledQuestionCount = $totalQuestions->total_questions;

                // Ensure that the first question after shuffling is the same as $question_id
                $firstShuffledId = intval($question_id);
                $firstShuffledIdIndex = array_search($firstShuffledId, $allQuestionIds);

                if ($firstShuffledIdIndex !== false) {
                    // Remove the $firstShuffledId from the array
                    unset($allQuestionIds[$firstShuffledIdIndex]);
                }

                // Take the desired count of shuffled questions
                $shuffledQuestionIds = array_slice($allQuestionIds, 0, $shuffledQuestionCount - 1);

                // Replace occurrences of $firstShuffledId with other IDs
                foreach ($shuffledQuestionIds as $index => $shuffledId) {
                    if ($shuffledId == $firstShuffledId) {
                        // Replace with another ID from the allQuestionIds array
                        $shuffledQuestionIds[$index] = array_shift($allQuestionIds);
                    }
                }

                // Add the $firstShuffledId to the beginning of the array
                array_unshift($shuffledQuestionIds, $firstShuffledId);

                session(['shuffledQuestionIds' => $shuffledQuestionIds, 'reshuffled' => true]);
            } else {
                // If not set or not reshuffled, use the existing shuffledQuestionIds or the original order
                $shuffledQuestionIds = session('shuffledQuestionIds');
            }




            // dd($shuffledQuestionIds);
            $currentQuestionIndex = array_search($question_id, $shuffledQuestionIds);

            // Determine the next and previous question IDs
            $nextQuestionId = $shuffledQuestionIds[($currentQuestionIndex + 1) % count($shuffledQuestionIds)];
            $previousQuestionId = $shuffledQuestionIds[($currentQuestionIndex - 1 + count($shuffledQuestionIds)) % count($shuffledQuestionIds)];

            $firstQuestionId =intval($shuffledQuestionIds[0]);
            $firstQuestion = FinalTestQuestions::find($firstQuestionId);
            // Check if the current question is the last one in the shuffled order

            $isLastQuestion = ($currentQuestionIndex + 1) == count($shuffledQuestionIds);

            // dd($shuffledQuestionIds, $nextQuestionId, $previousQuestionId, $firstQuestionId);

            // Fetch the question details based on the shuffled order
            $shuffledQuestionId = $shuffledQuestionIds[$currentQuestionIndex];
            $questionDetail = FinalTestQuestions::find($shuffledQuestionId);

            // Calculate the current question number based on the shuffled order
            $currentQuestionNumber = $currentQuestionIndex + 1;
            $latestQuestion = FinalTestQuestions::where('material_id', $material_id)->orderBy('id', 'desc')->first();
        }
        if ($type == "assignment") {
            if ($isReshuffle == 1) {
                // Retrieve all question IDs for the given material
                $allQuestionIds = AssignmentQuestions::where('material_id', $material_id)
                    ->pluck('id')->toArray();

                // Shuffle all question IDs
                shuffle($allQuestionIds);

                // Set the desired count of shuffled questions (e.g., 5)
                $shuffledQuestionCount = $totalQuestions->total_questions;

                // Ensure that the first question after shuffling is the same as $question_id
                $firstShuffledId = intval($question_id);
                $firstShuffledIdIndex = array_search($firstShuffledId, $allQuestionIds);

                if ($firstShuffledIdIndex !== false) {
                    // Remove the $firstShuffledId from the array
                    unset($allQuestionIds[$firstShuffledIdIndex]);
                }

                // Take the desired count of shuffled questions
                $shuffledQuestionIds = array_slice($allQuestionIds, 0, $shuffledQuestionCount - 1);

                // Replace occurrences of $firstShuffledId with other IDs
                foreach ($shuffledQuestionIds as $index => $shuffledId) {
                    if ($shuffledId == $firstShuffledId) {
                        // Replace with another ID from the allQuestionIds array
                        $shuffledQuestionIds[$index] = array_shift($allQuestionIds);
                    }
                }

                // Add the $firstShuffledId to the beginning of the array
                array_unshift($shuffledQuestionIds, $firstShuffledId);

                session(['shuffledQuestionIds' => $shuffledQuestionIds, 'reshuffled' => true]);
            } else {
                // If not set or not reshuffled, use the existing shuffledQuestionIds or the original order
                $shuffledQuestionIds = session('shuffledQuestionIds');
            }




            // dd($shuffledQuestionIds);
            $currentQuestionIndex = array_search($question_id, $shuffledQuestionIds);

            // Determine the next and previous question IDs
            $nextQuestionId = $shuffledQuestionIds[($currentQuestionIndex + 1) % count($shuffledQuestionIds)];
            $previousQuestionId = $shuffledQuestionIds[($currentQuestionIndex - 1 + count($shuffledQuestionIds)) % count($shuffledQuestionIds)];

            $firstQuestionId =intval($shuffledQuestionIds[0]);
            $firstQuestion = AssignmentQuestions::find($firstQuestionId);
            // Check if the current question is the last one in the shuffled order

            $isLastQuestion = ($currentQuestionIndex + 1) == count($shuffledQuestionIds);

            // dd($shuffledQuestionIds, $nextQuestionId, $previousQuestionId, $firstQuestionId);

            // Fetch the question details based on the shuffled order
            $shuffledQuestionId = $shuffledQuestionIds[$currentQuestionIndex];
            $questionDetail = AssignmentQuestions::find($shuffledQuestionId);

            // Calculate the current question number based on the shuffled order
            $currentQuestionNumber = $currentQuestionIndex + 1;
            $latestQuestion = AssignmentQuestions::where('material_id', $material_id)->orderBy('id', 'desc')->first();


        }
        $listQuestionId = $shuffledQuestionIds;
        // dd($listQuestionId);

        $material = Material::where('id', $material_id)->first();
        // dd($material_id);
        // dd($question_id);
        // dd($type);
        // dd($material);
        //  dd($latestQuestion->id);
        return view('contents.assignment_test_questions', ['currentQuestionIndex' => $currentQuestionIndex, 'totalQuestions'=>$totalQuestions, 'listQuestionId' => $listQuestionId, 'shuffledQuestionIds' => $shuffledQuestionIds, 'currentQuestionNumber' => $currentQuestionNumber, 'nextQuestionId' => $nextQuestionId, 'previousQuestionId' => $previousQuestionId, 'title' => $title, 'questionDetail' => $questionDetail, 'material' => $material,  'question_id' => $question_id, 'id' => $id, 'material_id' => $material_id, 'type' => $type, 'latestQuestion' => $latestQuestion, 'isLastQuestion' => $isLastQuestion, 'firstQuestion' => $firstQuestion]);
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
        // Log::info('Submit Answers Request:', $request->all());
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
        $material = Material::where('id',$materialId)->first();
        if ($material->materialContentToMasterType->master_type_name ==  "Assignment") {

            if (is_array($userAnswers)) {

                $searchResult = UserAnswerAssignment::where([
                    'user_id' => $userId,
                    'material_id' => $materialId,
                    'type' => 'Assignment',
                ])->first();

                // Check if a result is found
                if ($searchResult) {
                    UserAnswerAssignment::where('material_id', $materialId)
                        ->update(['question_shown' => false]);
                }

                foreach ($userAnswers as $answer) {
                    $questionId = $answer['questionId'];
                    $selectedAnswer = $answer['answer'];
                    $answerDetail = $answer['answerDetail'];

                    $existingAnswer = UserAnswerAssignment::where([
                        'user_id' => $userId,
                        'question_id' => $questionId,
                        'type' => 'Assignment', // Adjust the type as needed
                        'material_id' => $material->id,
                    ])->first();

                    if ($existingAnswer) {
                        // Jika jawaban sudah ada, update jawaban yang ada
                        $existingAnswer->update([
                            'selected_answer' => $selectedAnswer,
                            'answer_detail' => $answerDetail,
                            'question_shown' => true,
                        ]);
                    } else {
                        // Jika jawaban belum ada, tambahkan jawaban baru ke database
                        UserAnswerAssignment::create([
                            'user_id' => $userId,
                            'question_id' => $questionId,
                            'selected_answer' => $selectedAnswer,
                            'answer_detail' => $answerDetail,
                            'type' => 'Assignment', // Adjust the type as needed
                            'material_id' => $material->id,
                            'question_shown' => true,
                        ]);
                    }
                }
            }
        }

        if ($material->materialContentToMasterType->master_type_name ==  "Final Test") {
            if (is_array($userAnswers)) {
                $searchResult = UserAnswerFinalTest::where([
                    'user_id' => $userId,
                    'material_id' => $materialId,
                    'type' => 'Final Test',
                ])->first();

                // Check if a result is found
                if ($searchResult) {
                    UserAnswerFinalTest::where('material_id', $materialId)
                        ->update(['question_shown' => false]);
                }

                // Proses simpan jawaban ke dalam database atau lakukan tindakan lainnya sesuai kebutuhan
                foreach ($userAnswers as $answer) {
                    $questionId = $answer['questionId'];
                    $selectedAnswer = $answer['answer'];
                    $answerDetail = $answer['answerDetail'];
                    $existingAnswer = UserAnswerFinalTest::where([
                        'user_id' => $userId,
                        'question_id' => $questionId,
                        'type' => 'Final Test', // Adjust the type as needed
                        'material_id' => $material->id,
                    ])->first();

                    if ($existingAnswer) {
                        // Jika jawaban sudah ada, update jawaban yang ada
                        $existingAnswer->update([
                            'selected_answer' => $selectedAnswer,
                            'answer_detail' => $answerDetail,
                            'question_shown' => true,
                        ]);
                    } else {
                        // Jika jawaban belum ada, tambahkan jawaban baru ke database
                        UserAnswerFinalTest::create([
                            'user_id' => $userId,
                            'question_id' => $questionId,
                            'selected_answer' => $selectedAnswer,
                            'answer_detail' => $answerDetail,
                            'type' => 'Final Test',
                            'material_id' => $material->id,
                            'question_shown' => true,
                        ]);
                    }
                }
            }
        }
        // Hapus session 'shuffledQuestionIds'
        session()->forget('shuffledQuestionIds');

        // Kemudian, jika perlu, sesi 'reshuffled' juga dapat dihapus
        session()->forget('reshuffled');
        return redirect()->route('course.showResults', [$courseId, $materialId]);
    }


    public function showAssignmentResults($courseId, $materialId)
    {
        $sidebars = Sidebar::select(
            'sidebar.id',
            'sidebar.material_id',
            'sidebar.parent_id',
            'sidebar.title',
            'sidebar.course_id',
            'user_sidebar_progress.is_locked as user_is_locked',
            'user_sidebar_progress.is_visible as user_is_visible'
        )
            ->leftJoin('user_sidebar_progress', function ($join) use ($courseId) {
                $join->on('sidebar.id', '=', 'user_sidebar_progress.sidebar_id')
                    ->where('user_sidebar_progress.user_id', '=', auth()->id())
                    ->where('user_sidebar_progress.course_id', '=', $courseId);
            })
            ->where('sidebar.course_id', $courseId)
            ->orderBy('order')
            ->get();

        // dd($sidebars);


        $getFirstSidebar = Sidebar::select(
            'sidebar.id',
            'sidebar.material_id',
            'sidebar.parent_id',
            'sidebar.title',
            'sidebar.course_id',
            'user_sidebar_progress.is_locked as user_is_locked',
            'user_sidebar_progress.is_visible as user_is_visible'
        )
            ->leftJoin('user_sidebar_progress', function ($join) use ($courseId) {
                $join->on('sidebar.id', '=', 'user_sidebar_progress.sidebar_id')
                    ->where('user_sidebar_progress.user_id', '=', auth()->id())
                    ->where('user_sidebar_progress.course_id', '=', $courseId);
            })
            ->where('sidebar.course_id', $courseId)
            ->orderBy('order')
            ->first();



        $userSidebarProgress =  UserSidebarProgress::where('user_id', auth()->id())->where('course_id', $courseId)->get();
        $firstUserSidebarProgress =  UserSidebarProgress::where('user_id', auth()->id())->where('course_id', $courseId)->first();

        $user_id = auth()->id();
        $requestedMaterial = Sidebar::select(
            'sidebar.id',
            'sidebar.material_id',
            'user_sidebar_progress.is_locked as user_is_locked',
            'user_sidebar_progress.is_visible as user_is_visible'
        )
            ->leftJoin('user_sidebar_progress', function ($join) use ($courseId) {
                $join->on('sidebar.id', '=', 'user_sidebar_progress.sidebar_id')
                    ->where('user_sidebar_progress.user_id', '=', auth()->id())
                    ->where('user_sidebar_progress.course_id', '=', $courseId);
            })
            ->where('sidebar.course_id', $courseId)
            ->where('sidebar.material_id', $materialId)
            ->first();

        if ((!$requestedMaterial || $requestedMaterial->user_is_visible == false && $requestedMaterial->user_is_locked == true) && $getFirstSidebar->id != $requestedMaterial->id) {
            return redirect()->back();
        }

        $userCourseDetail = UserCourseDetail::where('user_id', auth()->id())->where('course_id', $courseId)->first();

        // Find the current material in the sorted sidebar list
        $currentMaterialIndex = $userSidebarProgress
            ->where('material_id', $materialId)
            ->where('user_id', $user_id)
            ->keys()
            ->first();

        $currentSidebar = $userSidebarProgress[$currentMaterialIndex]->sidebar;
        // $currentMaterial = $sidebars[$currentMaterialIndex];
        $previousMaterialIndex = $currentMaterialIndex - 1;
        $nextMaterialIndex = $currentMaterialIndex + 1;

        $currentMaterial = isset($userSidebarProgress[$currentMaterialIndex])
            ? UserSidebarProgress::find($userSidebarProgress[$currentMaterialIndex]->id)
            : null;


        // Retrieve the previous material or set it to null if it doesn't exist
        $previousMaterial = isset($userSidebarProgress[$previousMaterialIndex])
            ? UserSidebarProgress::find($userSidebarProgress[$previousMaterialIndex]->id)
            : null;

        // Retrieve the next material or set it to null if it doesn't exist
        $nextMaterial = isset($userSidebarProgress[$nextMaterialIndex])
            ? UserSidebarProgress::find($userSidebarProgress[$nextMaterialIndex]->id)
            : null;

        // Access the material_id attribute from the previous and next materials
        $previousMaterialId = $previousMaterial ? $userSidebarProgress[$previousMaterialIndex]->sidebarProgressToSidebar->material_id  : null;
        $nextMaterialId = $nextMaterial ? $userSidebarProgress[$nextMaterialIndex]->sidebarProgressToSidebar->material_id : null;

        // Access the title attribute from the previous and next materials
        $previousMaterialTitle = $previousMaterial ? $userSidebarProgress[$previousMaterialIndex]->sidebarProgressToSidebar->title  : null;
        $nextMaterialTitle = $nextMaterial ? $userSidebarProgress[$nextMaterialIndex]->sidebarProgressToSidebar->title : null;

        $enrollment = Enrollment::where('user_id', auth()->id())->where('course_id', $courseId)->first();
        $material = Material::findOrFail($materialId);
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
                // $assignmentQuestions = AssignmentQuestions::where('material_id', $materialId)->orderBy('id', 'asc')->get();

                // $userAnswers = UserAnswerAssignment::where('user_id', auth()->id())->orderBy('id', 'asc')->whereIn('question_id', $assignmentQuestions->pluck('id'))->get();

                $assignmentQuestions = AssignmentQuestions::where('material_id', $materialId)
                ->whereIn('id', function ($query) use ($materialId) {
                    $query->select('question_id')
                        ->from('user_answers_assignment')
                        ->where('material_id', $materialId)
                        ->where('user_id', auth()->id())
                        ->where('question_shown', true);
                })
                ->orderBy('id', 'asc')
                ->get();
                $userAnswers = UserAnswerAssignment::where('material_id', $materialId)
                    ->where('user_id', auth()->id())
                    ->whereIn('question_id', $assignmentQuestions->pluck('id'))
                    ->orderBy('id', 'asc')
                    ->get();
                // Calculate the user's score
                $totalQuestions = $material->total_questions;
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
                        break;
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

                $finalTestQuestions = FinalTestQuestions::where('material_id', $materialId)
                ->whereIn('id', function ($query) use ($materialId) {
                    $query->select('question_id')
                        ->from('user_answers_final_test')
                        ->where('material_id', $materialId)
                        ->where('user_id', auth()->id())
                        ->where('question_shown', true);
                })
                ->orderBy('id', 'asc')
                ->get();
                $userAnswers = UserAnswerFinalTest::where('material_id', $materialId)
                    ->where('user_id', auth()->id())
                    ->whereIn('question_id', $finalTestQuestions->pluck('id'))
                    ->orderBy('id', 'asc')
                    ->get();

                // Calculate the user's score
                $totalQuestions = $material->total_questions;
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
        $sidebars = Sidebar::select(
            'sidebar.id',
            'sidebar.material_id',
            'sidebar.parent_id',
            'sidebar.order',
            'sidebar.title',
            'sidebar.course_id',
            'user_sidebar_progress.is_locked as user_is_locked',
            'user_sidebar_progress.is_visible as user_is_visible'
        )
            ->leftJoin('user_sidebar_progress', function ($join) use ($id) {
                $join->on('sidebar.id', '=', 'user_sidebar_progress.sidebar_id')
                    ->where('user_sidebar_progress.user_id', '=', auth()->id())
                    ->where('user_sidebar_progress.course_id', '=', $id);
            })
            ->where('sidebar.course_id', $id)
            ->orderBy('order')
            ->first();

        // dd($sidebars);


        $getFirstSidebar = Sidebar::select(
            'sidebar.id',
            'sidebar.material_id',
            'sidebar.parent_id',
            'sidebar.title',
            'sidebar.course_id',
            'user_sidebar_progress.is_locked as user_is_locked',
            'user_sidebar_progress.is_visible as user_is_visible'
        )
            ->leftJoin('user_sidebar_progress', function ($join) use ($id) {
                $join->on('sidebar.id', '=', 'user_sidebar_progress.sidebar_id')
                    ->where('user_sidebar_progress.user_id', '=', auth()->id())
                    ->where('user_sidebar_progress.course_id', '=', $id);
            })
            ->where('sidebar.course_id', $id)
            ->orderBy('order')
            ->first();



        $userSidebarProgress =  UserSidebarProgress::where('user_id', auth()->id())->where('course_id', $id)->get();
        $firstUserSidebarProgress =  UserSidebarProgress::where('user_id', auth()->id())->where('course_id', $id)->first();

        $user_id = auth()->id();
        $requestedMaterial = Sidebar::select(
            'sidebar.id',
            'sidebar.material_id',
            'user_sidebar_progress.is_locked as user_is_locked',
            'user_sidebar_progress.is_visible as user_is_visible'
        )
            ->leftJoin('user_sidebar_progress', function ($join) use ($id) {
                $join->on('sidebar.id', '=', 'user_sidebar_progress.sidebar_id')
                    ->where('user_sidebar_progress.user_id', '=', auth()->id())
                    ->where('user_sidebar_progress.course_id', '=', $id);
            })
            ->where('sidebar.course_id', $id)
            ->where('sidebar.material_id', $material_id)
            ->first();
        if ((!$requestedMaterial || $requestedMaterial->user_is_visible == false && $requestedMaterial->user_is_locked == true) && $getFirstSidebar->id != $requestedMaterial->id) {
            return redirect()->back();
        }

        $userCourseDetail = UserCourseDetail::where('user_id', auth()->id())->where('course_id', $id)->first();

        // Find the current material in the sorted sidebar list
        $currentMaterialIndex = $userSidebarProgress
            ->where('material_id', $material_id)
            ->where('user_id', $user_id)
            ->keys()
            ->first();

        $currentSidebar = $userSidebarProgress[$currentMaterialIndex]->sidebar;
        // $currentMaterial = $sidebars[$currentMaterialIndex];
        $previousMaterialIndex = $currentMaterialIndex - 1;
        $nextMaterialIndex = $currentMaterialIndex + 1;

        $currentMaterial = isset($userSidebarProgress[$currentMaterialIndex])
            ? UserSidebarProgress::find($userSidebarProgress[$currentMaterialIndex]->id)
            : null;


        // Retrieve the previous material or set it to null if it doesn't exist
        $previousMaterial = isset($userSidebarProgress[$previousMaterialIndex])
            ? UserSidebarProgress::find($userSidebarProgress[$previousMaterialIndex]->id)
            : null;

        // Retrieve the next material or set it to null if it doesn't exist
        $nextMaterial = isset($userSidebarProgress[$nextMaterialIndex])
            ? UserSidebarProgress::find($userSidebarProgress[$nextMaterialIndex]->id)
            : null;

        // Access the material_id attribute from the previous and next materials
        $previousMaterialId = $previousMaterial ? $userSidebarProgress[$previousMaterialIndex]->sidebarProgressToSidebar->material_id  : null;
        $nextMaterialId = $nextMaterial ? $userSidebarProgress[$nextMaterialIndex]->sidebarProgressToSidebar->material_id : null;

        // Access the title attribute from the previous and next materials
        $previousMaterialTitle = $previousMaterial ? $userSidebarProgress[$previousMaterialIndex]->sidebarProgressToSidebar->title  : null;
        $nextMaterialTitle = $nextMaterial ? $userSidebarProgress[$nextMaterialIndex]->sidebarProgressToSidebar->title : null;

        $enrollment = Enrollment::where('user_id', auth()->id())->where('course_id', $id)->first();
        $materialCompleted = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $id)
            ->where('material_id', $material_id)
            ->where('enrollment_id', $enrollment->id)
            ->first();
        $remainingTime = null;
        $userSidebarProgress =  UserSidebarProgress::where('user_id', auth()->id())->where('course_id', $id)->get();
        $currentMaterialIndex = $userSidebarProgress
            ->where('material_id', $material_id)
            ->where('user_id', $user_id)
            ->keys()
            ->first();
        // dd($firstIndexASG->id);
        if ($type == 'assignment') {

            if ($materialCompleted->attempts == 3 && $materialCompleted->total_score < $material->minimum_score) {
                MaterialCompleted::where('material_id', $materialCompleted->material_id)->update([
                    'blocked_until' => Carbon::now()->addMinutes(2),
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
            if ($remainingTime == 0) {
                $materialCompleted->blocked_until = null;
                $materialCompleted->save();
                $remainingTime = 0;
            }
            if ($materialCompleted->total_score >= $material->minimum_score) {
                $nextMaterial->is_visible = true;
                $nextMaterial->save();
            }
            $sidebars = Sidebar::select(
                'sidebar.id',
                'sidebar.material_id',
                'sidebar.parent_id',
                'sidebar.order',
                'sidebar.title',
                'sidebar.course_id',
                'user_sidebar_progress.is_locked as user_is_locked',
                'user_sidebar_progress.is_visible as user_is_visible'
            )
                ->leftJoin('user_sidebar_progress', function ($join) use ($id) {
                    $join->on('sidebar.id', '=', 'user_sidebar_progress.sidebar_id')
                        ->where('user_sidebar_progress.user_id', '=', auth()->id())
                        ->where('user_sidebar_progress.course_id', '=', $id);
                })
                ->where('sidebar.course_id', $id)
                ->orderBy('order')
                ->first();
            $firstRandomQuestion = AssignmentQuestions::where('material_id', $material_id)->inRandomOrder()->first();
            $randomizedQuestions = AssignmentQuestions::where('material_id', $material_id)->get()->shuffle();
            $questions = AssignmentQuestions::where('material_id', $material_id)
            ->whereIn('id', function ($query) use ($material_id) {
                $query->select('question_id')
                    ->from('user_answers_assignment')
                    ->where('material_id', $material_id)
                    ->where('user_id', auth()->id())
                    ->where('question_shown', true);
            })
            ->orderBy('id', 'asc')
            ->get();
            $userAnswers = UserAnswerAssignment::where('material_id', $material_id)
                ->where('user_id', auth()->id())
                ->whereIn('question_id', $questions->pluck('id'))
                ->orderBy('id', 'asc')
                ->get();
            return view('contents.assignment_test_results', compact('userAnswers', 'questions', 'firstRandomQuestion', 'randomizedQuestions', 'remainingTime', 'sidebars', 'materialCompleted', 'sidebars', 'previousMaterial', 'nextMaterial', 'previousMaterialId', 'nextMaterialId', 'currentMaterialIndex', 'previousMaterialTitle', 'nextMaterialTitle',  'material', 'course', 'material_id', 'type'));
        }
        if ($type == 'finalTest') {

            if ($materialCompleted->attempts == 1 && $materialCompleted->total_score < $material->minimum_score) {
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
            if ($remainingTime == 0) {
                $materialCompleted->blocked_until = null;
                $materialCompleted->save();
                $remainingTime = 0;
            }
            // if ($materialCompleted->total_score >= $material->minimum_score) {
            //     $nextMaterial->is_visible = true;
            //     $nextMaterial->save();
            // }
            $sidebars = Sidebar::select(
                'sidebar.id',
                'sidebar.material_id',
                'sidebar.parent_id',
                'sidebar.order',
                'sidebar.title',
                'sidebar.course_id',
                'user_sidebar_progress.is_locked as user_is_locked',
                'user_sidebar_progress.is_visible as user_is_visible'
            )
                ->leftJoin('user_sidebar_progress', function ($join) use ($id) {
                    $join->on('sidebar.id', '=', 'user_sidebar_progress.sidebar_id')
                        ->where('user_sidebar_progress.user_id', '=', auth()->id())
                        ->where('user_sidebar_progress.course_id', '=', $id);
                })
                ->where('sidebar.course_id', $id)
                ->orderBy('order')
                ->first();
            $firstRandomQuestion = FinalTestQuestions::where('material_id', $material_id)->inRandomOrder()->first();
            $randomizedQuestions = FinalTestQuestions::where('material_id', $material_id)->get()->shuffle();
            $questions = FinalTestQuestions::where('material_id', $material_id)
            ->whereIn('id', function ($query) use ($material_id) {
                $query->select('question_id')
                    ->from('user_answers_final_test')
                    ->where('material_id', $material_id)
                    ->where('user_id', auth()->id())
                    ->where('question_shown', true);
            })
            ->orderBy('id', 'asc')
            ->get();
            $userAnswers = UserAnswerFinalTest::where('material_id', $material_id)
                ->where('user_id', auth()->id())
                ->whereIn('question_id', $questions->pluck('id'))
                ->orderBy('id', 'asc')
                ->get();
            return view('contents.assignment_test_results', compact('userAnswers', 'questions', 'firstRandomQuestion', 'randomizedQuestions', 'remainingTime', 'sidebars', 'materialCompleted', 'material', 'course', 'material_id', 'type'));
        }
    }

    protected function blockUserFor30Minutes($materialCompleted)
    {
        MaterialCompleted::where('material_id', $materialCompleted->material_id)->update([
            'blocked_until' => Carbon::now()->addMinutes(2),
            'attempts' => 0,
        ]);
    }

    protected function blockUserForADay($materialCompleted)
    {
        MaterialCompleted::where('material_id', $materialCompleted->material_id)->update([
            'blocked_until' => Carbon::now()->addMinutes(30),
            'attempts' => 0,
        ]);
    }

    public function congratulatePage($id,)
    {
        $course = Course::find($id);
        return view('contents.course_complete', ['course' => $course]);
    }

}
