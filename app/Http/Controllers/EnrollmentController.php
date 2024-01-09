<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Material;
use App\Models\UserCourseDetail;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    //
    public function enrollCourse($id,$materialId){
         if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Anda perlu masuk terlebih dahulu untuk mendaftar kelas.');
        }
        $user = auth()->user();
        // dd($materialId);

        $enrollment = new Enrollment([
            'user_id' => $user->id,
            'course_id' => $id,
            'completed' => false,
        ]);

        $enrollment->save();

        $addStudentsEnrolled = [];
        $addStudentsEnrolled = [
            'students_enrolled' => \DB::raw('students_enrolled + 1'),
        ];

        Course::where('id', $id)->update($addStudentsEnrolled);

        $userCourseDetail = UserCourseDetail::where('course_id', $id)->get();

        $existingMaterial = Material::where('course_id', $id)->first();
        if($userCourseDetail){
            if($existingMaterial){
                $userCourseDetail = new UserCourseDetail([
                    'user_id' => $user->id,
                    'course_id' => $id,
                    'last_accessed_material' => $existingMaterial->id,
                ]);
                $userCourseDetail->save();


                return redirect()->back()->with('success', 'You have successfully enrolled in the course.');
            }
        }

    }
}
