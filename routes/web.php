<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController as Admin;
// use App\Http\Controllers\TeacherController as Teacher;
// use App\Http\Controllers\StudentController as Student;
// use App\Http\Controllers\GuidanceController as Guidance;
use App\Http\Controllers\AdminCreateController as AdminCreate;

// for test only
// Route::get('/create', function() {
//     return view('admin.create.admin');
// });
// Route::post('create/admin', [PublicController::class, 'createAdmin'])->name('public.handleCreate.admin');
// for test only


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [PublicController::class, 'login'])->name('login');

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('login', [Admin::class, 'login'])->name('admin.login');
    Route::post('login', [Admin::class, 'handleLogin'])->name('admin.handleLogin');

    Route::get('profile', [Admin::class, 'profile'])->name('admin.profile');
    

    // Routes requiring admin authentication
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [Admin::class, 'home'])->name('admin.home');
        Route::get('dashboard', [Admin::class, 'dashboard'])->name('admin.dashboard');

        // Admin create accounts (admin/teacher/guidance/student)
        Route::get('create/admin', [AdminCreate::class, 'viewCreateAdmin'])->name('admin.create.admin');
        Route::get('create/teacher', [AdminCreate::class, 'viewCreateTeacher'])->name('admin.create.teacher');
        Route::get('create/guidance', [AdminCreate::class, 'viewCreateGuidance'])->name('admin.create.guidance');
        Route::get('create/student', [AdminCreate::class, 'viewCreateStudent'])->name('admin.create.student');

        Route::post('create/admin', [AdminCreate::class, 'createAdmin'])->name('admin.handleCreate.admin');
        Route::post('create/teacher', [AdminCreate::class, 'createTeacher'])->name('admin.handleCreate.teacher');
        Route::post('create/guidance', [AdminCreate::class, 'createGuidance'])->name('admin.handleCreate.guidance');
        Route::post('create/student', [AdminCreate::class, 'createStudent'])->name('admin.handleCreate.student');
        // End Admin create accounts (admin/teacher/guidance/student)


        // logout route
        Route::post('logout', [Admin::class, 'logout'])->name('admin.logout');
    });
});


// Teacher routes
Route::prefix('teacher')->group(function () {
    // Route::get('login', [Teacher::class, 'login'])->name('teacher.login');
    // Route::post('login', [Teacher::class, 'handleLogin'])->name('teacher.handleLogin');

    // Routes requiring teacher authentication
    Route::middleware('auth:teacher')->group(function () {
        
    });
});



// Student routes
Route::prefix('student')->group(function () {
    // Route::get('login', [student::class, 'login'])->name('student.login');
    // Route::post('login', [student::class, 'handleLogin'])->name('student.handleLogin');

    // Routes requiring student authentication
    Route::middleware('auth:student')->group(function () {
        
    });
});

// Guidance routes
Route::prefix('guidance')->group(function () {
    // Route::get('login', [Guidance::class, 'login'])->name('guidance.login');
    // Route::post('login', [Guidance::class, 'handleLogin'])->name('guidance.handleLogin');

    // Routes requiring guidance authentication
    Route::middleware('auth:guidance')->group(function () {
        
    });
});
