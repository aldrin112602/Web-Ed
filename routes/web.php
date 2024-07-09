<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as Admin;
use App\Http\Controllers\AdminCreateController as AdminCreate;

Route::get('/', function () {
    return view('welcome');
});

// admin routes
Route::get('/admin/login', [Admin::class, 'login'])->name('admin.login');
Route::post('/admin/login', [Admin::class, 'handleLogin'])->name('admin.handleLogin');

// Admin routes create ( admin/teacher/guidance/student )
// GET request
Route::get('/admin/create/admin', [AdminCreate::class, 'viewCreateAdmin'])->name('admin.create.admin');
Route::get('/admin/create/teacher', [AdminCreate::class, 'viewCreateTeacher'])->name('admin.create.teacher');
Route::get('/admin/create/guidance', [AdminCreate::class, 'viewCreateGuidance'])->name('admin.create.guidance');
Route::get('/admin/create/student', [AdminCreate::class, 'viewCreateStudent'])->name('admin.create.student');

// POST request
Route::post('/admin/create/admin', [AdminCreate::class, 'createAdmin'])->name('admin.handleCreate.admin');
Route::post('/admin/create/teacher', [AdminCreate::class, 'createTeacher'])->name('admin.handleCreate.teacher');
Route::post('/admin/create/guidance', [AdminCreate::class, 'createGuidance'])->name('admin.handleCreate.guidance');
Route::post('/admin/create/student', [AdminCreate::class, 'createStudent'])->name('admin.handleCreate.student');

// Route::middleware('auth:admin')->group(function () {
//     Route::get('admin/dashboard', function () {
//         return view('admin.dashboard');
//     });
// });
