<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('accounts', App\Http\Controllers\AccountController::class);

Route::resource('courses', App\Http\Controllers\CourseController::class);

Route::resource('applications', App\Http\Controllers\ApplicationController::class);

Route::resource('missions', App\Http\Controllers\MissionController::class);

Route::resource('tasks', App\Http\Controllers\TaskController::class);

Route::resource('labels', App\Http\Controllers\LabelController::class);

Route::resource('subjects', App\Http\Controllers\SubjectController::class);
