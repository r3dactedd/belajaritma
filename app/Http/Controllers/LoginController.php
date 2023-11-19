<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('authentication.login', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email:dns',
    //         'password' => 'required'
    //     ]);

    //     if($request->remember){
    //         Cookie::queue("rememberMe", $request->email, 120);
    //     }

    //     // KALO PASSWORD & EMAILNYA BENER
    //     if(Auth::attempt($credentials)) {
    //         Session::put('mysession',['email'=>$credentials['email'],'password' => $credentials['password']]);
    //         $request->session()->regenerate();

    //         if($request->remember){
    //             return redirect('/home');
    //         }else{
    //             return redirect('/home')->withoutCookie('rememberMe');
    //         }
    //     }

    //     // kalo salah
    //     return back()->with('loginError', 'Login failed!');
    // }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        $remember = $request->remember ? true : false;

        // KALAU PASSWORD & EMAILNYA BENER
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        // kalo salah
        return back()->with('loginError', 'Email atau Password yang anda berikan salah.');
    }

    public function logout()
    {
        Auth::logout();

        request()
            ->session()
            ->invalidate();

        request()
            ->session()
            ->regenerateToken();

        return redirect('/');
    }
}
