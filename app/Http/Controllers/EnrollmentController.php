<?php

namespace App\Http\Controllers;

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

        return redirect()->back()->with('success', 'You have successfully enrolled in the course.');
    }
}
