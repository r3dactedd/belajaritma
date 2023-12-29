<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    //
    public function enrollCourse($id){
         if (!Auth::check()) {
        // Jika pengguna belum masuk, redirect ke halaman login dengan pesan peringatan
        return redirect()->route('login')->with('warning', 'Anda perlu masuk terlebih dahulu untuk mendaftar kelas.');
    }
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
