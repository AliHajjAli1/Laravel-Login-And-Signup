<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        
        if (Auth::user()->hasRole('client')) {
            return view('dashboard')->with('bought', session('bought'));
        }

        
        if (Auth::user()->hasRole('admin')) {
            $sellings = User::whereNotNull('bought')->get();
            $totalSellings = $sellings->count();
            return view('dashboard', compact('sellings', 'totalSellings'));
        }

        return view('dashboard');
    }

    public function buy()
    {
        
        session(['bought' => true]);

        return redirect()->route('dashboard');
    }

    public function viewSellings(){
        
        $sellings = User::whereNotNull('bought')->get();
        $totalSellings = $sellings->count();

        return view('dashboard', compact('sellings', 'totalSellings'));
    }
}
