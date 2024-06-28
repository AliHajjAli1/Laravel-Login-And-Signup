<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller{
    
    public function showAdminForm() {
        $userCount = $this->countUsers();
        $users = $this->userslist();
        return view('admin', ['userCount' => $userCount],['users'=>$users]);
    }
    
    public function userslist(){
        $users = User::all();
        return $users;
    }
    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin')->with('success', 'User deleted successfully');
    }
    public function countUsers(){
        $userCount = DB::table('users')->count();
        return $userCount;
    }
}
