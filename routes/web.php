<?php
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/', [LoginController::class, 'login'])->name('login');
