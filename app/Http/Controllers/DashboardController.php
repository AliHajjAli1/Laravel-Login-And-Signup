<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Promo;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        
        if (Auth::user()->hasRole('client')) {
            return view('dashboard')->with('bought', session('bought'))->with('price', session('price', 4.99));
        }

        
        if (Auth::user()->hasRole('admin')) {
            $sellings = User::whereNotNull('bought')->get();
            $totalSellings = $sellings->count();
            $profit = $totalSellings * 4.99;
            return view('dashboard', compact('sellings', 'totalSellings','profit'));
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
        $profit = $totalSellings * 4.99;
        return view('dashboard', compact('sellings', 'totalSellings','profit'));
    }
    public function applyPromo(Request $request)
    {
        $promoCode = Promo::whereNotNull('promo')->get();
        $writtenpromoCode = $request->input('promo_code');
        if ($writtenpromoCode === $promoCode) {
            session(['price' => 2.99]);
        } else {
            session(['price' => 4.99]);
        }

        return redirect()->route('dashboard');
    }
}
