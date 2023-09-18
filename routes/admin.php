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

        //Referral
        Route::get('/referrals', [ReferralController::class, 'Index'])->name('referral');
        Route::post('/referral/levels', [ReferralController::class, 'levelStore'])->name('levels.store');
        Route::post('/deposit/commission', [ReferralController::class, 'commissionUpdate'])->name('commission.update');

        //Rewards
        Route::get('/rewards', [RewardsController::class, 'Index'])->name('rewards');
        Route::get('rewards/{id}/edit', [RewardsController::class, 'rewardEdit'])->name('reward.edit');
        Route::post('rewards/{id}/edit', [RewardsController::class, 'rewardUpdate'])->name('reward.update');

        //Manage User
        Route::get('/allusers', [UserManageController::class, 'Index'])->name('allusers');
        Route::get('/activeusers', [UserManageController::class, 'activeUsers'])->name('activeusers');
        Route::get('/pendingusers', [UserManageController::class, 'pendingUsers'])->name('pendingusers');
        Route::get('/blockedusers', [UserManageController::class, 'blockedUsers'])->name('blockedusers');
        Route::get('/emailunverified', [UserManageController::class, 'emailUnverifiedUsers'])->name('emailunverified');
        Route::get('/smsunverified', [UserManageController::class, 'smsUnverifiedUsers'])->name('smsunverified');

        Route::get('users/{id}', [UserManageController::class, 'userEdit'])->name('user.edit');
        Route::post('users/{id}', [UserManageController::class, 'userUpdate'])->name('user.update');



        //plan
        Route::get('/plan', [PlanController::class, 'Index'])->name('plan');
        Route::get('/plan/create', [PlanController::class, 'planCreate'])->name('plan.create');
        Route::post('/plan/create', [PlanController::class, 'planStore'])->name('plan.store');
        Route::get('plan/{id}/edit', [PlanController::class, 'planEdit'])->name('plan.edit');
        Route::post('plan/{id}/edit', [PlanController::class, 'planUpdate'])->name('plan.update');

        //Basic Settings
        Route::get('settings/basic', [BasicSettingsController::class, 'basicSettings'])->name('settings');
        Route::post('settings/basic', [BasicSettingsController::class, 'basicUpdate'])->name('basic.update');
        Route::get('settings/logo-favicon', [BasicSettingsController::class, 'logo'])->name('logo');
        Route::post('settings/logo-favicon', [BasicSettingsController::class, 'logoUpdate'])->name('logo.update');




        //logout
        Route::get('/logout', [Auth\LoginController ::class, 'logout'])->name('logout');
    });

});


