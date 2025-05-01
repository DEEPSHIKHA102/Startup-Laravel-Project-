<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CorporateController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\MatchingController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');


Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Password Reset Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'updatePassword'])->name('password.update');

/*
|--------------------------------------------------------------------------
| Corporate Routes
|--------------------------------------------------------------------------
*/
Route::prefix('corporate')->group(function () {
    Route::get('/dashboard', [CorporateController::class, 'dashboard'])
        ->name('corporate.dashboard');
    Route::get('/profile', [CorporateController::class, 'profile'])
        ->name('corporate.profile');
    Route::get('/search', [CorporateController::class, 'search'])
        ->name('corporate.search');
    Route::get('/matches', [CorporateController::class, 'matches'])
        ->name('corporate.matches');
});

/*
|--------------------------------------------------------------------------
| Startup Routes
|--------------------------------------------------------------------------
*/
Route::prefix('startup')->group(function () {
    Route::get('/dashboard', [StartupController::class, 'dashboard'])
        ->name('startup.dashboard');
    Route::get('/profile', [StartupController::class, 'profile'])
        ->name('startup.profile');
    Route::get('/pitch', [StartupController::class, 'pitch'])
        ->name('startup.pitch');
    Route::get('/matches', [StartupController::class, 'matches'])
        ->name('startup.matches');
});

/*
|--------------------------------------------------------------------------
| Matching System Routes
|--------------------------------------------------------------------------
*/
Route::get('/match/{id}', [MatchingController::class, 'show'])->name('match.show');
Route::post('/match/connect/{id}', [MatchingController::class, 'connect'])->name('match.connect');
Route::get('/matches', [MatchingController::class, 'index'])->name('matches.index');

/*
|--------------------------------------------------------------------------
| Fallback Route
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return view('errors.404');
});