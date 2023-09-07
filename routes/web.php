<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Referral\ReferralController;
use App\Http\Controllers\Admin\Management\PlanController;
use App\Http\Controllers\Admin\Management\RewardsController;





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
Route::get('/dashboard', [DashboardController::class, 'Index'])->name('dashboard');
Route::get('/referrals', [ReferralController::class, 'Index'])->name('referral');
Route::get('/plan', [PlanController::class, 'Index'])->name('plan');
Route::get('/rewards', [RewardsController::class, 'Index'])->name('rewards');
Route::get('/allusers', [RewardsController::class, 'Index1'])->name('allusers');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
