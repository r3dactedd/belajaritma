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
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    //
    // public function showSidebar($title, $id, $material_id)
    // {
    //     $material = Material::find($material_id);
    //     $sidebars = Sidebar::select('sidebar.id', 'sidebar.material_id', 'sidebar.parent_id', 'sidebar.title', 'sidebar.course_id', 'sidebar.is_locked')
    //         ->join('material', 'material.id', '=', 'sidebar.material_id')
    //         ->where('sidebar.course_id', $id)
    //         ->get();;
    //     $master_type = MasterType::find($material->master_type_id);
    //     switch ($master_type->master_type_name) {
    //         case 'Assignment':
    //             return view('contents.session_assignment', ['sidebars' => $sidebars, 'material' => $material, 'id' => $id]);
    //             break;
    //         case 'Video':
    //             return view('contents.session_video', ['sidebars' => $sidebars, 'material' => $material, 'id' => $id]);
    //             break;
    //         case 'PDF':
    //             return view('contents.session_pdf', ['sidebars' => $sidebars, 'material' => $material, 'id' => $id]);
    //             break;
    //     }
    //     // dd($sidebars);

    // }

    public function showMaterial($title, $id, $material_id)
    {
        // Retrieve the list of sidebar items for the current course and sort them
        $sidebars = Sidebar::select('sidebar.id', 'sidebar.material_id', 'sidebar.parent_id', 'sidebar.title', 'sidebar.course_id', 'sidebar.is_locked')
            ->where('course_id', $id)
            ->orderBy('order')
            ->get();

        // Find the current material in the sorted sidebar list
        $currentMaterialIndex = $sidebars->search(function ($item) use ($material_id) {
            return $item->material_id == $material_id;
        });
        $nextMaterialIndex = $currentMaterialIndex + 1;

        // Determine the previous and next material
        $currentMaterial = $sidebars[$currentMaterialIndex];
        $previousMaterial = $sidebars[$currentMaterialIndex - 1] ?? null;
        $nextMaterial = $sidebars[$currentMaterialIndex + 1] ?? null;
        $material = Material::findOrFail($material_id);
        $enrollment = Enrollment::where('user_id', auth()->id())->where('course_id', $id)->first();
        $findFinalSidebar = Sidebar::where('course_id', $id)->where('material_id', $material_id)->first();

        $course = Course::find($id);
        $excludeFinal = $course->total_module-1;
        $firstIndexASG = AssignmentQuestions::where('material_id', $material_id)->first();
        $firstIndexFIN = FinalTestQuestions::where('material_id', $material_id)->first();


        if ($enrollment){
            $materialCompleted = MaterialCompleted::where('user_id', auth()->id())->where('course_id', $id)
                ->where('material_id', $material_id)
                ->where('enrollment_id', $enrollment->id)
                ->exists();

                //Kalau sudah selesai material course sebelum final (Bukan Assignment dan Bukan Final Test)
                if (!$materialCompleted && $enrollment->material_completed_count < $excludeFinal
                && $material->materialContentToMasterType->master_type_name !=  "Assignment" && $material->materialContentToMasterType->master_type_name != "Final Test") {
                    MaterialCompleted::create([
                        'user_id' => auth()->id(),
                        'course_id' => $id,
                        'material_id' => $material_id,
                        'enrollment_id' => $enrollment->id,
                    ]);
                    $currentMaterial->is_locked = false;
                    $currentMaterial->save();

                    $enrollment->material_completed_count += 1;
                    $enrollment->total_duration_count+=$material->material_duration;
                    $enrollment->save();

                }
                //Kalau total complete sudah tinggal yg final saja
                if ($enrollment->material_completed_count == $excludeFinal ) {
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
        $userCourseDetail = UserCourseDetail::where('user_id', auth()->id())->where('course_id', $id)->first();
        $userCourseDetail->last_accessed_material = $material_id;
        $userCourseDetail->save();

        $master_type = MasterType::find($material->master_type_id);
        if ($master_type->master_type_name == 'Video') {
            return view('contents.session_video', compact('material', 'currentMaterialIndex','previousMaterial', 'nextMaterial', 'sidebars', 'id', 'excludeFinal', 'userCourseDetail','nextMaterialIndex'));
        } elseif ($master_type->master_type_name == 'PDF') {
            return view('contents.session_pdf', compact('material', 'currentMaterialIndex','previousMaterial', 'nextMaterial', 'sidebars', 'id', 'excludeFinal','userCourseDetail','nextMaterialIndex'));
        } elseif ($master_type->master_type_name == 'Assignment') {
            // dd($firstIndexASG);
            return view('contents.session_assignment_test', compact('material', 'currentMaterialIndex','previousMaterial', 'nextMaterial', 'sidebars', 'id', 'excludeFinal', 'firstIndexASG', 'firstIndexFIN','userCourseDetail','nextMaterialIndex'));
        }
        elseif ($master_type->master_type_name == 'Final Test') {
            // dd($firstIndexFIN);
            return view('contents.session_assignment_test', compact('material', 'currentMaterialIndex','previousMaterial', 'nextMaterial', 'sidebars', 'id', 'excludeFinal', 'firstIndexASG', 'firstIndexFIN','userCourseDetail','nextMaterialIndex'));
        }

    }


    //ini buat ngebuka page spesifik
    // public function handleMaterialNavigation($title, $course_id, $current_material_id, $direction)
    // {
    //     if ($direction === 'next') {
    //         return $this->nextMaterial($course_id, $current_material_id);
    //     } elseif ($direction === 'back') {
    //         return $this->previousMaterial($course_id, $current_material_id);
    //     }
    // }

    // public function nextMaterial($course_id, $current_material_id)
    // {
    //     $currentMaterial = Material::find($current_material_id);

    //     if (!$currentMaterial) {
    //         // Handle the case where the current material is not found
    //         return response()->json(['error' => 'Current material not found'], 404);
    //     }

    //     $nextMaterial = Material::where('course_id', $currentMaterial->course_id)
    //         ->where('order', '>', $currentMaterial->order)
    //         ->orderBy('order')
    //         ->first();

    //     if (!$nextMaterial) {
    //         // Handle the case where there is no next material
    //         return response()->json(['error' => 'No next material found'], 404);
    //     }

    //     if ($nextMaterial) {
    //         // Update the completion status
    //         $currentMaterial->update(['is_completed' => true]);
    //         $course = Course::find($course_id);
    //         $course->last_accessed_material = $nextMaterial->material_id;
    //         $course->save();

    //         $sidebars = Sidebar::select('sidebar.id', 'sidebar.material_id', 'sidebar.parent_id', 'sidebar.title', 'sidebar.course_id', 'sidebar.is_locked')
    //             ->join('material', 'material.id', '=', 'sidebar.material_id')
    //             ->where('sidebar.course_id', $course_id)
    //             ->get();

    //         // Tambahkan pemeriksaan keberadaan properti master_type_id
    //         if ($nextMaterial->master_type_id) {
    //             $master_type = MasterType::find($nextMaterial->master_type_id);

    //             switch ($master_type->master_type_name) {
    //                 case 'Assignment':
    //                     return view('contents.session_assignment', ['sidebars' => $sidebars, 'material' => $nextMaterial, 'id' => $course_id]);
    //                     break;
    //                 case 'Video':
    //                     return view('contents.session_video', ['sidebars' => $sidebars, 'material' => $nextMaterial, 'id' => $course_id]);
    //                     break;
    //                 case 'PDF':
    //                     return view('contents.session_pdf', ['sidebars' => $sidebars, 'material' => $nextMaterial, 'id' => $course_id]);
    //                     break;
    //             }
    //         } else {
    //             // Handle the case where master_type_id is null
    //         }
    //     } else {
    //         // Handle the case where there is no next material
    //         // You might want to redirect the user to a completion page or elsewhere.
    //     }
    // }

    // public function previousMaterial($course_id, $current_material_id)
    // {
    //     $currentMaterial = Material::find($current_material_id);
    //     $previousMaterial = Material::where('course_id', $currentMaterial->course_id)
    //         ->where('order', '<', $currentMaterial->order)
    //         ->orderByDesc('order')
    //         ->first();

    //     if ($previousMaterial) {
    //         $currentMaterial->update(['is_completed' => true]);
    //         $course = Course::find($course_id);
    //         $course->last_accessed_material = $previousMaterial->material_id;  // Sesuaikan dengan ID material berikutnya
    //         $course->save();

    //         $sidebars = Sidebar::select('sidebar.id', 'sidebar.material_id', 'sidebar.parent_id', 'sidebar.title', 'sidebar.course_id', 'sidebar.is_locked')
    //             ->join('material', 'material.id', '=', 'sidebar.material_id')
    //             ->where('sidebar.course_id', $course_id)
    //             ->get();;
    //         // Redirect to the next material
    //         $master_type = MasterType::find($previousMaterial->master_type_id);
    //         switch ($master_type->master_type_name) {
    //             case 'Assignment':
    //                 return view('contents.session_assignment', ['sidebars' => $sidebars, 'material' => $previousMaterial, 'id' => $course_id]);
    //                 break;
    //             case 'Video':
    //                 return view('contents.session_video', ['sidebars' => $sidebars, 'material' => $previousMaterial, 'id' => $course_id]);
    //                 break;
    //             case 'PDF':
    //                 return view('contents.session_pdf', ['sidebars' => $sidebars, 'material' => $previousMaterial, 'id' => $course_id]);
    //                 break;
    //         }
    //     } else {
    //         // Handle the case where there is no previous material
    //         // You might want to redirect the user to the current material or elsewhere.
    //     }
    // }
}
