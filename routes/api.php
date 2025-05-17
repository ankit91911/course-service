<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::post('/courses', [CourseController::class, 'store']);
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);
