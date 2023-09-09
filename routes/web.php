<?php

// namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\CheckUsernameController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);
Route::get('checkusername', [CheckUsernameController::class, 'Checkusername'])->name('checkusername');
Route::get('checkemail', [CheckUsernameController::class, 'checkemail'])->name('checkemail');
Route::get('checkphone', [CheckUsernameController::class, 'checkphone'])->name('checkphone');
Route::get('/pass', [CheckUsernameController::class, 'pass'])->name('pass');

