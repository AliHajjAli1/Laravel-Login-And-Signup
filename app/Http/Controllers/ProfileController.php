<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller{

    public function showProfileForm(){
        return view('profile');
    }
    public function addInfo(Request $request){
        $request->validate([
            'name'=> "required|max:50|string",
            'phone'=> "required|min:7|max:8|string",
            'address'=>"max:100"
        ]);
        
        $user=auth()->user();

        $user->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')
        ]);
        return redirect('/dashboard')->withErrors("Info Updated Successfully!");
    }
}
