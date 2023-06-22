<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;

Route::redirect('/', '/account');

// Authorization routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/account/update-password', [AuthController::class, 'updatePassword'])
    ->middleware('auth')
    ->name('account.updatePassword');

// Registration routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Personal account routes
Route::get('/account', [AccountController::class, 'index'])->middleware('auth');
Route::post('/account/update-contact', [AccountController::class, 'updateContact'])
->middleware('auth')->name('account.updateContact');
Route::get('/account/questionnaire', [AccountController::class, 'showQuestionnaire'])->middleware('auth');
Route::post('/account/questionnaire', [AccountController::class, 'submitQuestionnaire'])->middleware('auth');
