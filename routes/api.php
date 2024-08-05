<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/courses', [CourseController::class, 'popular']);

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);