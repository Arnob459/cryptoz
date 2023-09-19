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
        Route::get('/reward', [RewardsController::class, 'Index'])->name('rewards');
        Route::get('reward/{id}/edit', [RewardsController::class, 'rewardEdit'])->name('reward.edit');
        Route::post('reward/{id}/edit', [RewardsController::class, 'rewardUpdate'])->name('reward.update');

        Route::get('reward/{id}', [RewardsController::class, 'levelList'])->name('reward.level.list');
        Route::get('reward-edit/{id}', [RewardsController::class, 'levelEdit'])->name('reward.level.edit');
        Route::put('reward-update', [RewardsController::class, 'levelUpdate'])->name('reward.level.update');
        Route::get('reward/delete/{id}', [RewardsController::class, 'levelDelete'])->name('reward.level.delete');

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


        //Home Page

        //Banner
        Route::get('home/banner', [PagesController::class, 'Banner'])->name('banner');
        Route::post('home/banner', [PagesController::class, 'bannerUpdate'])->name('banner.update');
        //Slider
        Route::get('home/slider', [PagesController::class, 'Slider'])->name('slider');
        Route::get('home/slider/create', [PagesController::class, 'sliderCreate'])->name('slider.create');
        Route::post('home/slider/create', [PagesController::class, 'sliderStore'])->name('slider.store');
        Route::get('home/slider/edit/{id}', [PagesController::class, 'sliderEdit'])->name('slider.edit');
        Route::post('home/slider/edit/{id}', [PagesController::class, 'sliderUpdate'])->name('slider.update');
        Route::get('home/slider/delete/{id}', [PagesController::class, 'sliderDelete'])->name('slider.delete');

        //Services
        Route::get('home/services', [PagesController::class, 'Service'])->name('services');
        Route::post('home/services', [PagesController::class, 'serviceModify'])->name('serviceupdate');

        Route::get('home/services/create', [PagesController::class, 'servicesCreate'])->name('services.create');
        Route::post('home/services/create', [PagesController::class, 'servicesStore'])->name('services.store');
        Route::get('home/services/edit/{id}', [PagesController::class, 'servicesEdit'])->name('services.edit');
        Route::post('home/services/edit/{id}', [PagesController::class, 'servicesUpdate'])->name('services.update');
        Route::get('home/services/delete/{id}', [PagesController::class, 'servicesDelete'])->name('services.delete');

        //About
        Route::get('home/about', [PagesController::class, 'About'])->name('about');
        Route::post('home/about', [PagesController::class, 'aboutUpdate'])->name('about.update');

        //Counter
        Route::get('home/counter', [PagesController::class, 'Counter'])->name('counter');
        Route::post('home/counter', [PagesController::class, 'counterSectionUpdate'])->name('countersection.update');

        Route::get('home/counter/create', [PagesController::class, 'counterCreate'])->name('counter.create');
        Route::post('home/counter/create', [PagesController::class, 'counterStore'])->name('counter.store');
        Route::get('home/counter/edit/{id}', [PagesController::class, 'counterEdit'])->name('counter.edit');
        Route::post('home/counter/edit/{id}', [PagesController::class, 'counterUpdate'])->name('counter.update');
        Route::get('home/counter/delete/{id}', [PagesController::class, 'counterDelete'])->name('counter.delete');

        //Work
        Route::get('home/work', [PagesController::class, 'Work'])->name('work');
        Route::post('home/work', [PagesController::class, 'workSectionUpdate'])->name('worksection.update');

        Route::get('home/work/create', [PagesController::class, 'workCreate'])->name('work.create');
        Route::post('home/work/create', [PagesController::class, 'workStore'])->name('work.store');
        Route::get('home/work/edit/{id}', [PagesController::class, 'workEdit'])->name('work.edit');
        Route::post('home/work/edit/{id}', [PagesController::class, 'workUpdate'])->name('work.update');
        Route::get('home/work/delete/{id}', [PagesController::class, 'workDelete'])->name('work.delete');

        //Faq
        Route::get('home/faq', [PagesController::class, 'Faq'])->name('faq');
        Route::post('home/faq', [PagesController::class, 'faqSectionUpdate'])->name('faqsection.update');

        Route::get('home/faq/create', [PagesController::class, 'faqCreate'])->name('faq.create');
        Route::post('home/faq/create', [PagesController::class, 'faqStore'])->name('faq.store');
        Route::get('home/faq/edit/{id}', [PagesController::class, 'faqEdit'])->name('faq.edit');
        Route::post('home/faq/edit/{id}', [PagesController::class, 'faqUpdate'])->name('faq.update');
        Route::get('home/faq/delete/{id}', [PagesController::class, 'faqDelete'])->name('faq.delete');








        //logout
        Route::get('/logout', [Auth\LoginController ::class, 'logout'])->name('logout');
    });

});


