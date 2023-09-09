<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\CheckUsernameController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReferralController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\RewardsController;
use App\Http\Controllers\Admin\UserManageController;

use App\Http\Controllers\Auth\LoginController as UserLoginController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;





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

Route::get('/', function () {
    return view('welcome');
});
Route::get('checkusername', [CheckUsernameController::class, 'Checkusername'])->name('checkusername');
Route::get('checkemail', [CheckUsernameController::class, 'checkemail'])->name('checkemail');

Route::get('checkphone', [CheckUsernameController::class, 'checkphone'])->name('checkphone');
Route::get('/pass', [CheckUsernameController::class, 'pass'])->name('pass');






Route::group(['prefix' => 'user'],function(){
    Route::middleware(['guest'])->group(function () {
        //Your routes here
        Route::get('/forgotpassword', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot.password');
        Route::post('/forgotpassword', [ForgotPasswordController::class, 'showotp'])->name('show.otp');
        Route::get('/createotp', [ForgotPasswordController::class, 'createotp'])->name('create.otp');
        Route::post('/createotp', [ForgotPasswordController::class, 'otpConfirm'])->name('otp.confirm');
        Route::get('/createnewpass', [ForgotPasswordController::class, 'createnewPass'])->name('createnew.pass');
        Route::post('/createnewpass', [ForgotPasswordController::class, 'createPass'])->name('new.pass');


    });


    Route::middleware(['auth'])->group(function () {
        //Your routes here
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        Route::get('/logout', [UserLoginController::class, 'logout'])->name('user.logout');
    });


});


//Admin

Route::group(['prefix' => 'admin'],function(){
    Route::middleware(['is_admin_guest'])->group(function () {
        //Your routes here
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('adminlogin');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');
    });
    Route::middleware(['is_admin'])->group(function () {
        //Your routes here
        Route::get('/dashboard', [DashboardController::class, 'Index'])->name('admin.dashboard');
        Route::get('/referrals', [ReferralController::class, 'Index'])->name('referral');
        Route::get('/plan', [PlanController::class, 'Index'])->name('plan');
        Route::get('/rewards', [RewardsController::class, 'Index'])->name('rewards');
        Route::get('/allusers', [RewardsController::class, 'Index1'])->name('allusers');
        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });


});



Auth::routes();
