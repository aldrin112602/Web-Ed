<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// admin routes
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'handleLogin'])->name('admin.handleLogin');
Route::get('/admin/signup', [AdminController::class, 'signup'])->name('admin.signup');
Route::post('/admin/signup', [AdminController::class, 'handleSignup'])->name('admin.handleSignup');