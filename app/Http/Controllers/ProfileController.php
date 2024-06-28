<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return response()->json([
            'message' => 'User information updated successfully',
            'user' => $user
        ]);
    }
}
