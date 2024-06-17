<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $users = session()->get('users', []);
        $users[] = ['email' => $email, 'password' => $password];

        session()->put('users', $users);

        return redirect()->route('login.form')->with('success', 'Signup successful! Please log in.');
    }
}
