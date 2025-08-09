<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

Route::middleware(['role:Developer'])->group(function () {
    Route::resource('users', UsersController::class)->names('users');
    Route::resource('permissions', PermissionsController::class)->names('permissions');
    Route::resource('roles', RolesController::class)->names('roles');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard.index');

require __DIR__.'/auth.php';
