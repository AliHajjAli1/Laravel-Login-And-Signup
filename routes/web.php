<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckName;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/signup', function () {
    return view('signup');
})->middleware(CheckName::class);


Route::get('/home', [ProfileController::class, 'showProfileForm'])->name('profile.form');
Route::post('/home', [ProfileController::class, 'addInfo'])->name('profile');


Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');
Route::get('/email/verify', function () {
    return view('emailverification');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/', [LoginController::class, 'login'])->name('login');


Route::get('/admin', [AdminController::class, 'showAdminForm'])->name('admin');
Route::delete('/admin/users/{id}', 'App\Http\Controllers\AdminController@deleteUser')->name('admin.deleteUser');
Route::post('/admin','App\Http\Controllers\AdminController@gotoSellings')->name('admin.gotoSellings');

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
Route::post('/buy', [DashboardController::class, 'buy'])->name('buy');
Route::get('/view-sellings', [DashboardController::class, 'viewSellings'])->name('viewSellings');