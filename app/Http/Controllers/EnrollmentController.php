<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Material;
use App\Models\Sidebar;
use App\Models\UserCourseDetail;
use App\Models\UserSidebarProgress;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    //
    public function enrollCourse($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Anda perlu masuk terlebih dahulu untuk mendaftar kelas.');
        }
        $user = auth()->user();
        // dd($materialId);

        $enrollment = Enrollment::where('user_id', auth()->id())->where('course_id', $id)->first();
        if (!$enrollment) {
            $enrollment = new Enrollment([
                'user_id' => $user->id,
                'course_id' => $id,
                'completed' => false,
            ]);

            $enrollment->save();
        }


        $addStudentsEnrolled = [];
        $addStudentsEnrolled = [
            'students_enrolled' => \DB::raw('students_enrolled + 1'),
        ];

        Course::where('id', $id)->update($addStudentsEnrolled);


        $existingMaterial = Material::where('course_id', $id)->first();

        $userCourseDetail = UserCourseDetail::where('user_id', $user->id)
            ->where('course_id', $id)
            ->first();

        if (!$userCourseDetail) {
            $existingMaterial = Material::where('course_id', $id)->first();

            $userCourseDetail = new UserCourseDetail([
                'user_id' => $user->id,
                'course_id' => $id,
                'last_accessed_material' => $existingMaterial->id,
            ]);

            $userCourseDetail->save();
        }

        $userSidebarProgressCount = UserSidebarProgress::where('user_id', $user->id)
            ->where('course_id', $id)
            ->count();
        $sidebars = Sidebar::where('course_id', $id)->get();

        if ($userSidebarProgressCount < count($sidebars)) {
            $loop = 1;

            foreach ($sidebars as $sidebar) {
                $existingProgress = UserSidebarProgress::where('user_id', $user->id)
                    ->where('course_id', $sidebar->course_id)
                    ->where('material_id', $sidebar->material_id)
                    ->where('sidebar_id', $sidebar->id)
                    ->exists();

                if ($loop == 1) {
                    $isLocked = false;
                    $isVisible = true;
                }
                elseif($loop == 2){
                    $isLocked = true;
                    $isVisible = true;
                }
                else {
                    $isLocked = true;
                    $isVisible = false;
                }

                if (!$existingProgress) {
                    $userSidebarProgress = new UserSidebarProgress([
                        'user_id' => $user->id,
                        'sidebar_id' => $sidebar->id,
                        'course_id' => $id,
                        'material_id' => $sidebar->material_id,
                        'is_visible' => $isVisible,
                        'is_locked' => $isLocked,
                    ]);

                    $userSidebarProgress->save();
                }
                $loop++;
            }
            // dd($sidebars);
            return redirect()->back()->with('success', 'You have successfully enrolled in the course.');
        }
    }
}
