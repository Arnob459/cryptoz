<?php

// namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\ReferralStatisticController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;



use Illuminate\Support\Facades\Route;


    Route::middleware(['guest'])->group(function () {
        //Your routes here
        Route::get('/forgotpassword', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot.password');
        Route::post('/forgotpassword', [ForgotPasswordController::class, 'showotp'])->name('show.otp');
        Route::get('/createotp', [ForgotPasswordController::class, 'createotp'])->name('create.otp');
        Route::post('/createotp', [ForgotPasswordController::class, 'otpConfirm'])->name('otp.confirm');
        Route::get('/createnewpass', [ForgotPasswordController::class, 'createnewPass'])->name('createnew.pass');
        Route::post('/createnewpass', [ForgotPasswordController::class, 'createPass'])->name('new.pass');


    });

    Route::name('user.')->group(function() {
        Route::middleware(['auth'])->group(function () {
            //Your routes here
            Route::get('/home', [HomeController::class, 'Home'])->name('home');
            Route::get('/investment-plans', [InvestmentController::class, 'index'])->name('investment.plan');
            Route::get('/invest', [InvestmentController::class, 'invest'])->name('invest');

            Route::get('/referral-statistic', [ReferralStatisticController::class, 'index'])->name('referral.statistic');



            Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        });


    });
Auth::routes();
