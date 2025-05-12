<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated Shared Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Role-Based Dashboards (Authenticated + Verified)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/client/dashboard', function () {
        return view('dashboard.client');
    })->middleware('role:client')->name('client.dashboard');

    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin');
    })->middleware('role:admin')->name('admin.dashboard');

    Route::get('/employee/dashboard', function () {
        return view('dashboard.employee');
    })->middleware('role:employee')->name('employee.dashboard');

    Route::get('/qc/dashboard', function () {
        return view('dashboard.qc');
    })->middleware('role:qc')->name('qc.dashboard');
});

/*
|--------------------------------------------------------------------------
| Auth Scaffolding (Login, Register, Forgot Password, etc.)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
