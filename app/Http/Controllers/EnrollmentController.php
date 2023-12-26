<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Enrollment;
class EnrollmentController extends Controller
{
    //
    public function enrollCourse($id){
        $user = auth()->user();

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

        return redirect()->back()->with('success', 'You have successfully enrolled in the course.');
    }
}
