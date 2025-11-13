<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController; // tambahin ini

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard'); // diperbaiki
    Route::resource('students', StudentController::class);
});
