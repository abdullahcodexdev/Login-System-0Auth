<?php

use App\Http\Controllers\AuthPageController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication
Route::get('/signin', [AuthPageController::class, 'signin'])->name('signin');
Route::post('/signin', [AuthPageController::class, 'localSignin'])->name('signin.post');
Route::get('/signup', [AuthPageController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthPageController::class, 'localSignup'])->name('signup.post');
Route::get('/signout', [AuthPageController::class, 'signout'])->name('signout');

// Password reset
Route::get('/forgot-password', [AuthPageController::class, 'forgot'])->name('password.forgot');
Route::post('/forgot-password', [AuthPageController::class, 'sendReset'])->name('password.email');
Route::get('/reset-code', [AuthPageController::class, 'resetCode'])->name('password.code');
Route::post('/reset-code', [AuthPageController::class, 'verifyResetCode'])->name('password.code.verify');
Route::get('/reset-password/{token}', [AuthPageController::class, 'reset'])->name('password.reset');
Route::post('/reset-password', [AuthPageController::class, 'updatePassword'])->name('password.update');

// Two-step verification
Route::get('/two-step', [AuthPageController::class, 'twoStep'])->name('two-step');
Route::post('/two-step', [AuthPageController::class, 'verifyTwoStep'])->name('two-step.verify');

// Social OAuth
Route::get('/auth/{provider}', [AuthPageController::class, 'social'])->name('auth.social');
Route::get('/auth/{provider}/callback', [AuthPageController::class, 'callback'])->name('auth.callback');

// Account
Route::get('/profile', [AccountController::class, 'profile'])->name('profile');
Route::post('/profile', [AccountController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/password', [AccountController::class, 'updatePassword'])->name('profile.password');
Route::get('/settings', [AccountController::class, 'settings'])->name('settings');
Route::post('/settings/email', [AccountController::class, 'updateEmail'])->name('settings.email');
Route::post('/settings/two-step', [AccountController::class, 'updateTwoStep'])->name('settings.two-step');
