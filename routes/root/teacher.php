<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\TeacherController as Teacher;
use App\Http\Controllers\Teacher\TeacherOtpController;
use App\Http\Controllers\Teacher\TeacherConversationController;
use App\Http\Controllers\Teacher\SubjectController as Subject;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Teacher\GradeHandleController;
use App\Http\Controllers\Teacher\StudentController;
use App\Http\Controllers\Teacher\Account;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/


// Teacher routes
Route::prefix('teacher')->group(function () {
    Route::get('login', [Teacher::class, 'login'])->name('teacher.login');
    Route::post('login', [Teacher::class, 'handleLogin'])->name('teacher.handleLogin');

    // for reset password
    Route::get('forgot-password', [TeacherOtpController::class, 'request'])->name('teacher.password.request');
    Route::post('forgot-password', [TeacherOtpController::class, 'sendOtp'])->name('teacher.password.otp');
    Route::get('reset-password', [TeacherOtpController::class, 'reset'])->name('teacher.password.reset');
    Route::post('reset-password', [TeacherOtpController::class, 'update'])->name('teacher.password.update');

    Route::get('verify-otp', [TeacherOtpController::class, 'verifyFormOtp'])->name('teacher.verify-form.otp');

    Route::post('verify-otp', [TeacherOtpController::class, 'verifyOtp'])->name('teacher.verify.otp');



    Route::middleware('auth:teacher')->group(function () {


        Route::get('/add_student', [Account::class, 'viewAddStudent'])->name('teacher.add.student');





        // Add teacher-specific routes here
        Route::get('dashboard', [Teacher::class, 'dashboard'])->name('teacher.dashboard');

        Route::get('/student_list', [StudentController::class, 'index'])->name('teacher.student_list');

        // grade handle
        // Grade handle routes
        Route::get('grade_handle/add', [GradeHandleController::class, 'viewAddHandleGrade'])->name('teacher.view.add_grade_handle');
        Route::post('grade_handle/add', [GradeHandleController::class, 'submitAddHandleGrade'])->name('teacher.submit.add_grade_handle');

        Route::get('grade_handle/edit/{id}', [GradeHandleController::class, 'viewUpdateGradeHandle'])->name('teacher.edit.grade_handle');

        Route::put('grade_handle/update/{id}', [GradeHandleController::class, 'updateGradeHandle'])->name('teacher.update.grade_handle');
        
        Route::delete('grade_handle/delete', [GradeHandleController::class, 'deleteGradeHandle'])->name('teacher.delete.grade_handle');


        // subject list
        Route::get('/subject_list', [Subject::class, 'subjectList'])->name('teacher.subject_list');


        // Subject
        Route::get('/my_subjects', [Subject::class, 'index'])->name('teacher.subjects');
        Route::prefix('subject')->group(function () {
            Route::get('create', [Subject::class, 'viewCreateSubject'])->name('teacher.create.subject');
            Route::post('create', [Subject::class, 'createSubject'])->name('teacher.handleCreate.subject');
            Route::delete('{id}', [Subject::class, 'deleteSubject'])->name('teacher.delete.subject');
            Route::get('{id}/edit', [Subject::class, 'viewEditSubject'])->name('teacher.edit.subject');
            Route::put('{id}', [Subject::class, 'updateSubject'])->name('teacher.update.subject');
        });

        Route::delete('delete-selected-subjects', [Subject::class, 'deleteSelectedSubjects'])->name('delete.selected.subjects');

        // chat conversation
        Route::get('/chats', [TeacherConversationController::class, 'index'])->name('teacher.chats.index');
        Route::get('/chats/messages', [TeacherConversationController::class, 'loadMessages'])->name('teacher.chats.loadMessages');
        Route::post('/chats/send', [TeacherConversationController::class, 'sendMessage']);
        Route::get('chats/counts', [TeacherConversationController::class, 'getMessageCounts'])->name('teacher.get_message_count');


        // Teacher logout route
        Route::post('logout', [Teacher::class, 'logout'])->name('teacher.logout');

        // teacher profile routes
        Route::prefix('profile')->group(function () {
            Route::get('/', [Teacher::class, 'profile'])->name('teacher.profile');
            Route::post('updatePhoto', [Teacher::class, 'updateProfilePhoto'])->name('teacher.updateProfilePhoto');
            Route::delete('deletePhoto', [Teacher::class, 'deleteProfilePhoto'])->name('teacher.deleteProfilePhoto');
            Route::put('updateAccount', [Teacher::class, 'updateAccount'])->name('teacher.updateAccount');
            Route::put('updatePassword', [Teacher::class, 'updatePassword'])->name('teacher.updatePassword');
        });



        Route::prefix('export')->group(function () {
            Route::get('subject_list', [ExcelController::class, 'exportTeacherSubjectList'])->name('teacher.export.subject');
        });
    });
});
