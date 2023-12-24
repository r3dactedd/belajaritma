<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\ValidationException;
use App\Models\Transaction;

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
    public function editProfile()
    {
        $searchUser = User::find(Auth::user()->id);
        return view('profile.profile_edit', ['searchUser' => $searchUser]);
    }

    public function viewProfile() {
        $searchUser = User::find(Auth::user()->id);
        $displayUser = User::all();
        $profileImageUrl = asset('/profile_img/' . $searchUser->profile_img);
        $transactionHistory = Transaction::where('user_id', $searchUser->id)->get();

        $enrolledCourses = $searchUser->enrollments()->with('course')->get()->pluck('course');
        $completedCourses = $searchUser->enrollments->where('completed', true);

        $registeredCertification = $searchUser->registerCertifications()->with('certification')->get();
        $passedCertification = $searchUser->registerCertifications->where('passed', true);

        return view('profile.profile', [
            'searchUser' => $searchUser,
            'display' => $displayUser,
            'profileImageUrl' => $profileImageUrl,
            'transactionHistory' => $transactionHistory,
            'enrolledCourses' => $enrolledCourses,
            'completedCourses' => $completedCourses,
            'registeredCertification' => $registeredCertification,
            'passedCertification'=> $passedCertification,
        ]);
    }

    public function update(Request $request)
    {
        $validateProfile = $request->validate([
            'profile_img' => 'image|file',
            'full_name' => 'required|string|min:3|max:50',
            'username' => 'required|string|min:3|max:30',
            'about_me' => 'max:150',
        ]);

        // Initialize $changeProfile as an empty array
        $changeProfile = [];

        if ($request->hasFile('profile_img')) {
            $filename = Str::orderedUuid() . '.' . $request->file('profile_img')->getClientOriginalExtension();
            $request->file('profile_img')->storeAs('profile_images', $filename, 'profile_images');
            $changeProfile['profile_img'] = $filename;
        }

        // Check if 'profile_img' exists in the validated data
        if (array_key_exists('profile_img', $validateProfile)) {
            unset($validateProfile['profile_img']);
        }

        $changeProfile += [
            'username' => $validateProfile['username'],
            'full_name' => $validateProfile['full_name'],
            'about_me' => $validateProfile['about_me'],
        ];

        User::where('id', Auth::user()->id)->update($changeProfile);
        return redirect('/profile/name')->with('success', 'Data user sudah diupdate!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => ['required', 'alpha_num', 'min:8'],
            'confirm_password' => ['required', 'alpha_num', 'min:8'],
        ]);

        $user = Auth::user();

        // Verify the old password
        if (!Hash::check($request->old_password, $user->password) || $request->confirm_password != $request->new_password) {
            return redirect('/profile/name/edit')->with('error', 'Password change failed!');
        }

        User::where('id', Auth::user()->id)->update([
            'password' => bcrypt($request->new_password),
        ]);
        return redirect('/profile/name')->with('success', 'Password changed successfully!');
    }
}
