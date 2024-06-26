<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\ValidationException;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', ['user' => $user]);
    }

    // public function viewProfile(){
    //     $data = Course::all();
    //     return view('courses.courses',['data'=>$data]);
    // }

    public function homePage()
    {
        $searchUser = null;
        $enrolledCourses = [];

        if (Auth::check()) {
            $searchUser = User::find(Auth::user()->id);
            $enrolledCourses = $searchUser
                ->enrollments()
                ->with('course')
                ->latest()
                ->get();
        }

        return view('home', ['searchUser' => $searchUser, 'enrolledCourses' => $enrolledCourses]);
    }

    public function viewProfile($username)
    {
        $searchUser = User::where('username', $username)->first();
        if (!$searchUser) {
            return view('errors.404error', ['message' => 'User not found.']);
        }
        if ($searchUser->enrollments==null) {
            $wholeCourses = null;
            $wholeCourses = null;

            $totalDuration = null;
            $totalMaterialComplete = null;
            $displayUser = null;
            $profileImageUrl = asset('uploads/profile_images/' . $searchUser->profile_img);
            $transactionHistory = Transaction::where('user_id', $searchUser->id)->get();


            $enrolledCourses = null;
            $completedCourses = null;

            $registeredCertification = null;
            $passedCertification = null;

            return view('profile.profile', [
                'searchUser' => $searchUser,
                'display' => $displayUser,
                'profileImageUrl' => $profileImageUrl,
                'transactionHistory' => $transactionHistory,
                'enrolledCourses' => $enrolledCourses,
                'completedCourses' => $completedCourses,
                'registeredCertification' => $registeredCertification,
                'passedCertification' => $passedCertification,
                'totalMaterialComplete' => $totalMaterialComplete,
                'wholeCourses' => $wholeCourses,
                'totalDuration' => $totalDuration,
            ]);
        }
        else{
            $wholeCourses = $searchUser
            ->enrollments()
            ->with('course')
            ->latest()
            ->get();

            $totalDuration = $searchUser
                    ->enrollments()
                    ->with('course')
                    ->latest()
                    ->sum('total_duration_count');
            $totalMaterialComplete = $searchUser
                    ->materialComplete()
                    ->get();
            $displayUser = User::all();
            $profileImageUrl = asset('uploads/profile_images/' . $searchUser->profile_img);
            $transactionHistory = Transaction::where('user_id', $searchUser->id)->get();


            $enrolledCourses = $searchUser
                ->enrollments()
                ->with('course')
                ->get()
                ->pluck('course');
            $completedCourses = $searchUser->enrollments->where('completed', true);

            $registeredCertification = $searchUser
                ->registerCertifications()
                ->with('certification')
                ->get();
            $passedCertification = $searchUser->registerCertifications->where('passed', true);

            return view('profile.profile', [
                'searchUser' => $searchUser,
                'display' => $displayUser,
                'profileImageUrl' => $profileImageUrl,
                'transactionHistory' => $transactionHistory,
                'enrolledCourses' => $enrolledCourses,
                'completedCourses' => $completedCourses,
                'registeredCertification' => $registeredCertification,
                'passedCertification' => $passedCertification,
                'totalMaterialComplete' => $totalMaterialComplete,
                'wholeCourses' => $wholeCourses,
                'totalDuration' => $totalDuration,
            ]);
        }
    }

    public function update(Request $request)
    {
        Log::info('Request Data:', $request->all());
        $rules = [
            'full_name' => 'string|min:3|max:50',
            'username' => 'string|min:3|max:30|unique:users,username,' . Auth::user()->id,
            'about_me' => 'nullable|string|max:150',
            'profile_img' => 'image|mimes:jpeg,png,jpg,gif|max:10000'
        ];
        $validator = Validator::make($request->all(), $rules);

         // Verify the old password
         if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        // Initialize $changeProfile as an empty array


        if ($request->hasFile('profile_img')) {
            $filename = Str::orderedUuid() . '.' . $request->file('profile_img')->getClientOriginalExtension();
            $request->file('profile_img')->storeAs('profile_images', $filename, 'profile_images');
            User::where('id', Auth::user()->id)->update([
                'full_name' => $request->full_name,
                'username' => $request->username,
                'about_me' => $request->about_me,
                'profile_img' => $filename,

            ]);
        }
        else{
            User::where('id', Auth::user()->id)->update([
                'full_name' => $request->full_name,
                'username' => $request->username,
                'about_me' => $request->about_me,
            ]);
        }

        // dd($request->profile_img);

        return Redirect::to("/profile/$request->username");
    }
    public function editProfile()
    {
        $searchUser = User::find(Auth::user()->id);
        return view('profile.profile_edit', ['searchUser' => $searchUser]);
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();


        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|regex:/^(?=.*[a-zA-Z])(?=.*[0-9]).{8,}$/',
            'confirm_password' => 'required|regex:/^(?=.*[a-zA-Z])(?=.*[0-9]).{8,}$/|same:new_password',
        ];

        $validator = Validator::make($request->all(), $rules);

         // Verify the old password
         if (!Hash::check($request->old_password, $user->password)) {
            $validator->errors()->add('old_password', 'Password lama tidak sesuai');
            return back()->withErrors($validator);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        User::where('id', Auth::user()->id)->update([
            'password' => bcrypt($request->new_password),
        ]);
        return Redirect::to("/profile/{$request->username}");
    }
}
