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
    $writtenPromoCode = $request->input('promo_code');
    $promo = Promo::where('promo', $writtenPromoCode)->where('isValid', true)->first();

    if ($promo) {
        session(['price' => 2.99]);
        session()->flash('success', 'Promo code applied successfully!');
    } else {
        session(['price' => 4.99]);
        session()->flash('error', 'Invalid promo code!');
    }

    return redirect()->route('dashboard');
}

}
