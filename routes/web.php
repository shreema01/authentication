<?php

// namespace App\Http\Controllers\Auth; 
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PageController;


Route::get('/about', [PageController::class, 'about_us'])->name('about-us');
Route::get('/contact', [PageController::class, 'contact_us'])->name('contact_us');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


use App\Http\Controllers\StudentController;

use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome'); 
});

Route::resource('students', StudentController::class)
    ->middleware(['auth']); 

// teacher add
use App\Http\Controllers\TeacherController;
Route::resource('teachers', TeacherController::class)
    ->middleware(['auth']);


use App\Http\Controllers\TeacherLoginController;

// Teacher Authentication Routes
Route::get('/teacher/login', [TeacherLoginController::class, 'showLoginForm'])->name('teacher.login');
Route::post('/teacher/login', [TeacherLoginController::class, 'login'])->name('teacher.login.submit');
Route::post('/teacher/logout', [TeacherLoginController::class, 'logout'])->name('teacher.logout');

Route::middleware('auth:teacher')->group(function () {
    Route::get('/teacher/dashboard', [TeacherLoginController::class, 'dashboard'])->name('teacher.dashboard');
});


