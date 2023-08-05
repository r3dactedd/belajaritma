<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

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
        return view('profile.editProfile',['searchUser'=>$searchUser]);
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
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'username' => 'required|max:25',
            'email' => 'required|email:dns',
            'password' => ['required', 'alpha_num', Password::min(8)->numbers()->letters()],
            'profile_img' => 'required|image|file'
        ]);
        $changeProfile = [
            'first_name'=>$validateProfile['first_name'],
            'last_name'=>$validateProfile['last_name'],
            'username'=>$validateProfile['username'],
            'email'=>$validateProfile['email'],
            'password'=>bcrypt($validateProfile['password']),
            'profile_img'=>$validateProfile['profile_img'],
        ];
        $changeProfile['profile_img'] = $request->file('profile_img')->getClientOriginalName();
        $request->file('profile_img')->storeAs('public/profile_img',$changeProfile['profile_img']);
        User::where('id',Auth::user()->id)->update($changeProfile);
        return redirect('/profile')->with('success', 'User data has been updated!');
    }
}
