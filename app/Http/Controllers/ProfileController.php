<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\ValidationException;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', ['user'=>$user]);
    }

    // public function viewProfile(){
    //     $data = Course::all();
    //     return view('courses.courses',['data'=>$data]);
    // }
    public function editProfile(){
        $searchUser = User::find(Auth::user()->id);
        return view('profile.profile_edit',['searchUser'=>$searchUser]);
    }

    public function viewProfile(){
        $searchUser = User::find(Auth::user()->id);
        $displayUser = User::all();
        return view('profile.profile',['searchUser'=>$searchUser,'display'=>$displayUser]);
    }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'first_name' => 'required|max:25',
    //         'last_name' => 'required|max:25',
    //         'email' => 'required|email:dns',
    //         'password' => ['required', 'alpha_num', Password::min(8)->numbers()->letters()],
    //         'profile_img' => 'required|image|file'
    //     ]);

    //     $userId = Auth::id();
    //     $user = User::find($userId);

    //     $user->first_name = $request->firstname;
    //     $user->last_name = $request->lastname;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     // $user->gender_id = $request->gender_id;

    //     $filename = Str::orderedUuid() . "." . $request->profile_img->getClientOriginalExtension();

    //     $user->profile_img = $filename;

    //     Storage::putFileAs('public/images', $request->profile_img, $filename);

    //     $user->save();

    //     return redirect('/profile')->with('success', 'User data has been updated!');
    // }

    public function update(Request $request){

        $validateProfile = $request->validate([
            'profile_img' => 'required|image|file',
            'full_name' => 'required|string|max:255',
            'username' => 'required|max:25',
            'email' => 'required|email:dns',
            'about_me' => 'required|max:150',
        ]);
        $fullname = $request->input('full_name');
        $nameParts = explode(' ', $fullname);

        $changeProfile = [
            'profile_img'=>$validateProfile['profile_img'],
            'username'=>$validateProfile['username'],
            'full_name'=>$validateProfile['full_name'],
            'first_name' => reset($nameParts),
            'last_name' => end($nameParts),
            'email'=>$validateProfile['email'],
            'about_me'=>$validateProfile['about_me'],
        ];

        if ($request->hasFile('profile_img')) {
            $filename = Str::orderedUuid() . "." . $request->file('profile_img')->getClientOriginalExtension();
            $request->file('profile_img')->storeAs('public/images', $filename);
            $changeProfile['profile_img'] = $filename;
        }

        User::where('id',Auth::user()->id)->update($changeProfile);
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
        if (!Hash::check($request->old_password, $user->password) || $request->confirm_password!=$request->new_password) {
            return redirect('/profile/name/edit')->with('error', 'Password change failed!');
        }

        User::where('id',Auth::user()->id)->update([
            'password' => bcrypt($request->new_password),
        ]);
;

        return redirect('/profile/name')->with('success', 'Password changed successfully!');
    }

}
