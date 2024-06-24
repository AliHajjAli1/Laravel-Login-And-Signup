<?php
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckName;

Route::get('/home', function () {
    return view('profile');
})->name('home');
Route::get('/signup', function () {
    return view('signup');
})->middleware(CheckName::class);


Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/', [LoginController::class, 'login'])->name('login');
