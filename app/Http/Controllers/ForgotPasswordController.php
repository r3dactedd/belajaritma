<?php

namespace App\Http\Controllers;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\User;
use Hash;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForgetPassword()
    {
        return view('authentication.forgot');
    }

    public function submitForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
        $email = $request->email;
        DB::table('password_reset')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        Mail::to($request->email)->send(new ForgotPasswordMail($token, $email));
        // Mail::send('email.forgotmail', ['token' => $token], function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject('Reset Password');
        // });
        return redirect('/login')->with('success', 'Email untuk melakukan reset password telah dikirim!');
    }

    public function showResetPassword($token, $email)
    {
        return view('authentication.reset', ['token' => $token, 'email' => $email]);
    }

    public function submitResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Ensure you have a field/token in your form and passed along with the request.
        // $request->token should contain the reset token.

        $updatePassword = DB::table('password_reset')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])
            ->first();

        if (!$updatePassword) {
            return back()
                ->withInput()
                ->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
        } else {
            return back()
                ->withInput()
                ->with('error', 'User not found!');
        }

        DB::table('password_reset')
            ->where('email', $request->email)
            ->delete();

        return redirect('/login')->with('success', 'Password berhasil direset.');
    }
}
