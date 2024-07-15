<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController as Admin;
use App\Http\Controllers\AdminCreateController as AdminCreate;
use App\Http\Controllers\AccountManagementController as AccountManagement;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [PublicController::class, 'login'])->name('login');

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('login', [Admin::class, 'login'])->name('admin.login');
    Route::post('login', [Admin::class, 'handleLogin'])->name('admin.handleLogin');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [Admin::class, 'home'])->name('admin.home');
        Route::get('dashboard', [Admin::class, 'dashboard'])->name('admin.dashboard');

        // Admin profile routes
        Route::prefix('profile')->group(function () {
            Route::get('/', [Admin::class, 'profile'])->name('admin.profile');
            Route::post('updatePhoto', [Admin::class, 'updateProfilePhoto'])->name('admin.updateProfilePhoto');
            Route::delete('deletePhoto', [Admin::class, 'deleteProfilePhoto'])->name('admin.deleteProfilePhoto');
            Route::put('updateAccount', [Admin::class, 'updateAccount'])->name('admin.updateAccount');
            Route::put('updatePassword', [Admin::class, 'updatePassword'])->name('admin.updatePassword');
        });

        // Admin create accounts routes
        Route::prefix('create')->group(function () {
            Route::get('admin', [AdminCreate::class, 'viewCreateAdmin'])->name('admin.create.admin');
            Route::get('teacher', [AdminCreate::class, 'viewCreateTeacher'])->name('admin.create.teacher');
            Route::get('guidance', [AdminCreate::class, 'viewCreateGuidance'])->name('admin.create.guidance');
            Route::get('student', [AdminCreate::class, 'viewCreateStudent'])->name('admin.create.student');
            Route::post('admin', [AdminCreate::class, 'createAdmin'])->name('admin.handleCreate.admin');
            Route::post('teacher', [AdminCreate::class, 'createTeacher'])->name('admin.handleCreate.teacher');
            Route::post('guidance', [AdminCreate::class, 'createGuidance'])->name('admin.handleCreate.guidance');
            Route::post('student', [AdminCreate::class, 'createStudent'])->name('admin.handleCreate.student');
        });

        // Admin subjects routes
        Route::prefix('subject')->group(function () {
            Route::get('list', [SubjectController::class, 'subject_list'])->name('admin.subject_list');
            Route::get('create', [SubjectController::class, 'viewCreateSubject'])->name('admin.create.subject');
            Route::post('create', [SubjectController::class, 'createSubject'])->name('admin.handleCreate.subject');
            Route::delete('{id}', [SubjectController::class, 'deleteSubject'])->name('admin.delete.subject');
            Route::get('{id}/edit', [SubjectController::class, 'editSubject'])->name('admin.edit.subject');
            Route::put('{id}', [SubjectController::class, 'updateSubject'])->name('admin.update.subject');
        });

        // Admin logout route
        Route::post('logout', [Admin::class, 'logout'])->name('admin.logout');

        // Account management routes
        Route::prefix('account_management')->group(function () {
            Route::get('student_list', [AccountManagement::class, 'student_list'])->name('admin.student_list');
            Route::get('admin_list', [AccountManagement::class, 'admin_list'])->name('admin.admin_list');
            Route::get('teacher_list', [AccountManagement::class, 'teacher_list'])->name('admin.teacher_list');
            Route::get('guidance_list', [AccountManagement::class, 'guidance_list'])->name('admin.guidance_list');

            Route::prefix('student')->group(function () {
                Route::delete('{id}', [AccountManagement::class, 'deleteStudent'])->name('admin.delete.student');
                Route::get('{id}/edit', [AccountManagement::class, 'editStudent'])->name('admin.edit.student');
                Route::put('{id}', [AccountManagement::class, 'updateStudent'])->name('admin.update.student');
            });

            Route::prefix('teacher')->group(function () {
                Route::delete('{id}', [AccountManagement::class, 'deleteTeacher'])->name('admin.delete.teacher');
                Route::get('{id}/edit', [AccountManagement::class, 'editTeacher'])->name('admin.edit.teacher');
                Route::put('{id}', [AccountManagement::class, 'updateTeacher'])->name('admin.update.teacher');
            });

            Route::prefix('admin')->group(function () {
                Route::delete('{id}', [AccountManagement::class, 'deleteAdmin'])->name('admin.delete.admin');
                Route::get('{id}/edit', [AccountManagement::class, 'editAdmin'])->name('admin.edit.admin');
                Route::put('{id}', [AccountManagement::class, 'updateAdmin'])->name('admin.update.admin');
            });

            Route::prefix('guidance')->group(function () {
                Route::delete('{id}', [AccountManagement::class, 'deleteGuidance'])->name('admin.delete.guidance');
                Route::get('{id}/edit', [AccountManagement::class, 'editGuidance'])->name('admin.edit.guidance');
                Route::put('{id}', [AccountManagement::class, 'updateGuidance'])->name('admin.update.guidance');
            });
        });

        // Accounts exporting routes
        Route::prefix('export')->group(function () {
            Route::get('admin_list', [ExcelController::class, 'exportAdminList'])->name('admin.export.admin');
            Route::get('student_list', [ExcelController::class, 'exportStudentList'])->name('admin.export.student');
            Route::get('guidance_list', [ExcelController::class, 'exportGuidanceList'])->name('admin.export.guidance');
            Route::get('teacher_list', [ExcelController::class, 'exportTeacherList'])->name('admin.export.teacher');
            Route::get('subject_list', [ExcelController::class, 'exportSubjectList'])->name('admin.export.subject');
        });
    });
});

// Teacher routes
Route::prefix('teacher')->group(function () {
    // Route::get('login', [Teacher::class, 'login'])->name('teacher.login');
    // Route::post('login', [Teacher::class, 'handleLogin'])->name('teacher.handleLogin');

    Route::middleware('auth:teacher')->group(function () {
        // Add teacher-specific routes here
    });
});

// Student routes
Route::prefix('student')->group(function () {
    // Route::get('login', [Student::class, 'login'])->name('student.login');
    // Route::post('login', [Student::class, 'handleLogin'])->name('student.handleLogin');

    Route::middleware('auth:student')->group(function () {
        // Add student-specific routes here
    });
});

// Guidance routes
Route::prefix('guidance')->group(function () {
    // Route::get('login', [Guidance::class, 'login'])->name('guidance.login');
    // Route::post('login', [Guidance::class, 'handleLogin'])->name('guidance.handleLogin');

    Route::middleware('auth:guidance')->group(function () {
        // Add guidance-specific routes here
    });
});
