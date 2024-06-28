<?php

use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckName;

Route::get('/signup', function () {
    return view('signup');
})->middleware(CheckName::class);

Route::get('/home', [ProfileController::class, 'showProfileForm'])->name('profile.form');
Route::post('/home', [ProfileController::class, 'addInfo'])->name('profile');


Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [SignupController::class, 'signup'])->name('signup');


Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/', [LoginController::class, 'login'])->name('login');


Route::get('/admin', [AdminController::class, 'showAdminForm'])->name('admin');
Route::delete('/admin/users/{id}', 'App\Http\Controllers\AdminController@deleteUser')->name('admin.deleteUser');