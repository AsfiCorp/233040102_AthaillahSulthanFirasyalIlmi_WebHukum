<?php

use App\Http\Controllers\Admin\AdvocateController as AdminAdvocateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\AdvocateController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// ──────────────────────────────────────────────────────────────────────────────
// Public Routes
// ──────────────────────────────────────────────────────────────────────────────

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/advocates', [AdvocateController::class, 'index'])->name('advocates.index');
Route::get('/advocates/{advocate}', [AdvocateController::class, 'show'])->name('advocates.show');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])
    ->name('contact.submit')
    ->middleware('throttle:10,1');

// Chatbot API
Route::post('/chatbot', [ChatbotController::class, 'chat'])
    ->name('chatbot')
    ->middleware('throttle:30,1');

// ──────────────────────────────────────────────────────────────────────────────
// Authentication Routes (Manual — no starter kit)
// ──────────────────────────────────────────────────────────────────────────────

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Google OAuth
    Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ──────────────────────────────────────────────────────────────────────────────
// Admin Routes (auth-protected)
// ──────────────────────────────────────────────────────────────────────────────

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Advocate CRUD
    Route::get('/advocates', [AdminAdvocateController::class, 'index'])->name('advocates.index');
    Route::get('/advocates/create', [AdminAdvocateController::class, 'create'])->name('advocates.create');
    Route::post('/advocates', [AdminAdvocateController::class, 'store'])->name('advocates.store');
    Route::get('/advocates/{advocate}/edit', [AdminAdvocateController::class, 'edit'])->name('advocates.edit');
    Route::put('/advocates/{advocate}', [AdminAdvocateController::class, 'update'])->name('advocates.update');
    Route::delete('/advocates/{advocate}', [AdminAdvocateController::class, 'destroy'])->name('advocates.destroy');

    // News CRUD
    Route::get('/news', [AdminNewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [AdminNewsController::class, 'create'])->name('news.create');
    Route::post('/news', [AdminNewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [AdminNewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [AdminNewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [AdminNewsController::class, 'destroy'])->name('news.destroy');
});
