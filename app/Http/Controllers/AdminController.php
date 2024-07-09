<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Promo;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    public function gotoSellings(){
        return redirect("/dashboard");
    }
    public function addPromo(Request $request){
        $promo = $request->input('new_promo_code');
        $request->validate([
            'new_promo'=>'required|string|min:3|max:8'
        ]);
        Promo::create([
            'promo'=> $promo,
            'isValid'=>true,
        ]);
    }
}
