<?php

use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::middleware('auth:sanctum')->group(function (): void {
    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::post('/jobs', [JobController::class, 'store']);
    Route::put('/jobs/{job}', [JobController::class, 'update']);
    Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

    Route::get('/applications', [ApplicationController::class, 'index']);
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store']);

    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile/employer', [ProfileController::class, 'updateEmployer']);
    Route::put('/profile/employee', [ProfileController::class, 'updateEmployee']);
});
