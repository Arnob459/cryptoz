<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Admin

Route::name('admin.')->group(function() {

    Route::middleware(['is_admin_guest'])->group(function () {
        //Your routes here
        Route::get('/login', [Auth\LoginController ::class, 'showLoginForm'])->name('adminlogin');
        Route::post('/login', [Auth\LoginController ::class, 'login'])->name('login');
    });
    Route::middleware(['is_admin'])->group(function () {
        //Dashboard
        Route::get('/dashboard', [DashboardController::class, 'Index'])->name('dashboard');
        //Profile
        Route::get('/profile/{id}', [DashboardController::class, 'AdminDetails'])->name('profile');
        Route::post('/update/{id}',[DashboardController::class,'AdminDetailsUpdate'])->name('profile.update');

        //password
        Route::get('/change/password/{id}',[DashboardController::class,'ChangePassword'])->name('password');
        Route::post('/change/password/{id}',[DashboardController::class,'UpdatePassword'])->name('password.update');


        Route::get('/referrals', [ReferralController::class, 'Index'])->name('referral');
        Route::get('/plan', [PlanController::class, 'Index'])->name('plan');
        Route::get('/rewards', [RewardsController::class, 'Index'])->name('rewards');
        Route::get('/allusers', [UserManageController::class, 'Index'])->name('allusers');
        Route::get('/logout', [Auth\LoginController ::class, 'logout'])->name('logout');
    });

});


