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
        Route::get('/profile', [DashboardController::class, 'Profile'])->name('profile');
        Route::post('/update',[DashboardController::class,'profileUpdate'])->name('profile.update');

        //password
        Route::get('/change/password',[DashboardController::class,'ChangePassword'])->name('password');
        Route::post('/change/password',[DashboardController::class,'UpdatePassword'])->name('password.update');


        Route::get('/referrals', [ReferralController::class, 'Index'])->name('referral');
        Route::post('/referral/levels', [ReferralController::class, 'getReferralLevels']);


        Route::get('/rewards', [RewardsController::class, 'Index'])->name('rewards');
        Route::get('/allusers', [UserManageController::class, 'Index'])->name('allusers');

        //plan
        Route::get('/plan', [PlanController::class, 'Index'])->name('plan');
        Route::get('/plan/create', [PlanController::class, 'planCreate'])->name('plan.create');
        Route::post('/plan/create', [PlanController::class, 'planStore'])->name('plan.store');

        //Basic Settings
        Route::get('settings/basic', [BasicSettingsController::class, 'basicSettings'])->name('settings');
        Route::post('settings/basic', [BasicSettingsController::class, 'basicUpdate'])->name('basic.update');
        Route::get('settings/logo-favicon', [BasicSettingsController::class, 'logo'])->name('logo');
        Route::post('settings/logo-favicon', [BasicSettingsController::class, 'logoUpdate'])->name('logo.update');




        //logout
        Route::get('/logout', [Auth\LoginController ::class, 'logout'])->name('logout');
    });

});


