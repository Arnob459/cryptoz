<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Auth\CheckUsernameController;
// use App\Http\Controllers\HomeController;

// use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\ReferralController;
// use App\Http\Controllers\Admin\PlanController;
// use App\Http\Controllers\Admin\RewardsController;
// use App\Http\Controllers\Admin\UserManageController;

// use App\Http\Controllers\Auth\LoginController as UserLoginController;
// use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;





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
        //Your routes here
        Route::get('/dashboard', [DashboardController::class, 'Index'])->name('dashboard');
        Route::get('/referrals', [ReferralController::class, 'Index'])->name('referral');
        Route::get('/plan', [PlanController::class, 'Index'])->name('plan');
        Route::get('/rewards', [RewardsController::class, 'Index'])->name('rewards');
        Route::get('/allusers', [UserManageController::class, 'Index'])->name('allusers');
        Route::get('/logout', [Auth\LoginController ::class, 'logout'])->name('logout');
    });

});


