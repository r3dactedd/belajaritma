<?php

namespace App\Http\Controllers;

use App\Models\AssignmentQuestions;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\FinalTestQuestions;
use App\Models\MasterType;
use App\Models\Material;
use App\Models\MaterialCompleted;
use App\Models\Sidebar;
use App\Models\UserCourseDetail;
use App\Models\UserSidebarProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SidebarController extends Controller
{

    public function showMaterial($title, $id, $material_id)
    {
        // Retrieve the list of sidebar items for the current course and sort them
        $sidebars = Sidebar::select(
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



        $material = Material::findOrFail($material_id);
        $enrollment = Enrollment::where('user_id', auth()->id())->where('course_id', $id)->first();
        $findFinalSidebar = Sidebar::where('course_id', $id)->where('material_id', $material_id)->first();
        $user = Auth::user();
        $course = Course::find($id);
        $excludeFinal = $course->total_module - 1;
        $firstRandomQuestionASG = AssignmentQuestions::where('material_id', $material_id)->inRandomOrder()->first();
        $firstRandomQuestionFIN = FinalTestQuestions::where('material_id', $material_id)->inRandomOrder()->first();

        if ($enrollment) {
            $materialCompleted = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $id)
                ->where('material_id', $material_id)
                ->where('enrollment_id', $enrollment->id)
                ->exists();

            //Kalau sudah selesai material course sebelum final (Bukan Assignment dan Bukan Final Test)
            if (
                !$materialCompleted
                && $material->materialContentToMasterType->master_type_name !=  "Assignment" && $material->materialContentToMasterType->master_type_name != "Final Test"
            ) {
                MaterialCompleted::create([
                    'user_id' => auth()->id(),
                    'course_id' => $id,
                    'material_id' => $material_id,
                    'enrollment_id' => $enrollment->id,
                ]);
                $currentMaterial->is_locked = false;
                $currentMaterial->is_visible = true;
                $currentMaterial->save();
                if ($enrollment->material_completed_count < $excludeFinal) {
                    $enrollment->material_completed_count += 1;
                    $enrollment->total_duration_count += $material->material_duration;
                    $enrollment->save();
                }
            }

            if ($material->materialContentToMasterType->master_type_name ==  "Assignment" && $material->materialContentToMasterType->master_type_name == "Final Test") {
                $currentMaterial->is_visible = true;
                $currentMaterial->save();
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
                $userCourse = UserCourseDetail::where('course_id', $enrollment->course_id)->where('user_id', $enrollment->user_id)->first();

                if ($userCourse) {
                    $userCourse->last_accessed_material = $previousMaterial ? $previousMaterialId : $nextMaterialId;
                    $userCourse->save();
                }
            }
        }
        // Load the corresponding material view based on the material type
        // $material = Material::findOrFail($material_id);

        $userCourseDetail->last_accessed_material = $material_id;
        $userCourseDetail->save();


        $masterTypeName = $currentMaterial->sidebarProgressToMaterial->materialContentToMasterType->master_type_name;
        if ($masterTypeName !=  "Assignment" && $masterTypeName = "Final Test") {
            $nextMaterial->is_visible = true;
            $nextMaterial->save();
        }
        // dd($nextFurthestMaterial);
        $getMatCompleted = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $id)
            ->where('material_id', $material_id)
            ->where('enrollment_id', $enrollment->id)
            ->first();

        $master_type = MasterType::find($material->master_type_id);
        $sidebars = Sidebar::select(
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
            ->get();
        if ($master_type->master_type_name == 'Video') {
            return view('contents.session_video', compact('material', 'userSidebarProgress', 'currentMaterialIndex', 'previousMaterial', 'nextMaterial', 'previousMaterialId', 'nextMaterialId', 'nextMaterialTitle', 'previousMaterialTitle', 'sidebars', 'id', 'excludeFinal', 'userCourseDetail', 'nextMaterialIndex'));
        } elseif ($master_type->master_type_name == 'PDF') {
            return view('contents.session_pdf', compact('material','userSidebarProgress', 'currentMaterialIndex', 'previousMaterial', 'nextMaterial', 'previousMaterialId', 'nextMaterialId', 'nextMaterialTitle', 'previousMaterialTitle', 'sidebars', 'id', 'excludeFinal', 'userCourseDetail', 'nextMaterialIndex'));
        } elseif ($master_type->master_type_name == 'Assignment') {
            // dd($firstIndexASG);
            return view('contents.session_assignment_test', compact('material', 'previousMaterial', 'nextMaterial', 'previousMaterialId', 'nextMaterialId', 'currentMaterialIndex', 'previousMaterialTitle', 'nextMaterialTitle', 'sidebars', 'id', 'excludeFinal', 'firstRandomQuestionASG', 'firstRandomQuestionFIN', 'userCourseDetail', 'nextMaterialIndex', 'materialCompleted', 'getMatCompleted'));
        } elseif ($master_type->master_type_name == 'Final Test') {
            // dd($firstIndexFIN);
            return view('contents.session_assignment_test', compact('material', 'currentMaterialIndex', 'previousMaterial', 'nextMaterial', 'sidebars', 'id', 'excludeFinal', 'firstRandomQuestionASG', 'firstRandomQuestionFIN', 'userCourseDetail', 'nextMaterialIndex', 'materialCompleted', 'getMatCompleted'));
        }
    }
}
