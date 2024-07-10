<?php

use App\Http\Controllers\DashboardController;
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
Route::post('/admin/goto-sellings', [AdminController::class, 'gotoSellings'])->name('admin.gotoSellings');
Route::post('/admin/add-promo', [AdminController::class, 'addPromo'])->name('admin.addPromo');

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
Route::post('/buy', [DashboardController::class, 'buy'])->name('buy');
Route::get('/view-sellings', [DashboardController::class, 'viewSellings'])->name('viewSellings');
Route::post('/promo', [DashboardController::class, 'applyPromo'])->name('promo');