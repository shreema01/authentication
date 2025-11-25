<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\TeacherController;

// Public routes
Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);


// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('get-user', [AuthenticationController::class, 'userInfo']);
    Route::post('logout', [AuthenticationController::class, 'logOut']);

    // Student CRUD with profile picture upload
    Route::apiResource('students', StudentController::class);

    // Teacher CRUD
    Route::apiResource('teachers', TeacherController::class);

});
