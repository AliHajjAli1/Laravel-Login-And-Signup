<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SignupController extends Controller{

    public function showSignupForm(){
        return view('signup');
    }

    public function signup(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role'=>strtolower(trim($request->email)) === strtolower("alihjali2004@gmail.com") ? "admin" : "client",
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('login.form')->with('status', 'Done!');
    }
}
