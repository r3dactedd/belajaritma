<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'full_name' => 'required|string|min:3|max:50',
            'username' => 'required|string|min:3|max:30',
            'email' => 'required|string',
            'password' => 'required|string|min:6|max:30',
            'password_confirmation' => 'same:password',
            'profile_img' => 'image|file',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = new User();
        $user->full_name = $request->full_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 2;
        //give default placeholder instead
        $user->about_me = ' ';
        $user->save();
        return redirect('/login')->with('success', 'Registrasi Akun Berhasil.');
    }
}
