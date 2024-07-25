<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AdminController as Admin;
use App\Http\Controllers\Teacher\TeacherController as Teacher;
use App\Http\Controllers\Student\StudentController as Student;
use App\Http\Controllers\Guidance\GuidanceController as Guidance;
use App\Http\Controllers\Admin\AdminCreateController as AdminCreate;
use App\Http\Controllers\Admin\AccountManagementController as AccountManagement;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\AdminOtpController;
use App\Http\Controllers\Teacher\TeacherOtpController;
use App\Http\Controllers\Student\StudentOtpController;
use App\Http\Controllers\Guidance\GuidanceOtpController;
use App\Http\Controllers\Admin\deleteSelected;
use App\Http\Controllers\Admin\attendanceController as Attendace;
use App\Http\Controllers\Teacher\TeacherConversationController;
use App\Http\Controllers\Admin\AdminConversationController;
use App\Http\Controllers\Student\StudentConversationController;
use App\Http\Controllers\Guidance\GuidanceConversationController;
use App\Http\Controllers\FaceRecognitionController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/face_recognition', [FaceRecognitionController::class, 'showFaceRecognition'])->name('face.recognition');
Route::get('/api/student-labels', [FaceRecognitionController::class, 'getStudentLabels'])->name('fetch_labels');


Route::get('/login', [PublicController::class, 'login'])->name('login');

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('login', [Admin::class, 'login'])->name('admin.login');
    Route::post('login', [Admin::class, 'handleLogin'])->name('admin.handleLogin');



    // for reset password
    Route::get('forgot-password', [AdminOtpController::class, 'request'])->name('admin.password.request');
    Route::post('forgot-password', [AdminOtpController::class, 'sendOtp'])->name('admin.password.otp');
    Route::get('reset-password', [AdminOtpController::class, 'reset'])->name('admin.password.reset');
    Route::post('reset-password', [AdminOtpController::class, 'update'])->name('admin.password.update');

    Route::get('verify-otp', [AdminOtpController::class, 'verifyFormOtp'])->name('admin.verify-form.otp');

    Route::post('verify-otp', [AdminOtpController::class, 'verifyOtp'])->name('admin.verify.otp');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [Admin::class, 'dashboard'])->name('admin.dashboard');

        // view student subjects route
        Route::get('/student/subjects/{id}', [SubjectController::class, 'viewStudentSubjects'])->name('admin.view.subjects');
        Route::post('/student/subjects/add', [SubjectController::class, 'addSubject'])->name('admin.add.subject');
        Route::delete('/student/subjects/delete/{studentId}/{subjectId}', [SubjectController::class, 'deleteStudentSubject'])->name('admin.delete.studentSubject');


        // chat conversation
        Route::get('/chats', [AdminConversationController::class, 'index'])->name('admin.chats.index');
        Route::get('/chats/messages', [AdminConversationController::class, 'loadMessages'])->name('admin.chats.loadMessages');
        Route::post('/chats/send', [AdminConversationController::class, 'sendMessage']);
        Route::get('chats/counts', [AdminConversationController::class, 'getMessageCounts'])->name('admin.get_message_count');


        // for attendace
        Route::prefix('attendance')->group(function () {
            Route::get('report', [Attendace::class, 'attendaceReport'])->name('admin.attendance.report');
            Route::get('absent', [Attendace::class, 'attendaceAbsent'])->name('admin.attendance.absent');
            Route::get('present', [Attendace::class, 'attendacePresent'])->name('admin.attendance.present');
        });


        // for deleting selected accounts
        Route::delete('/admin/delete-selected-students', [deleteSelected::class, 'deleteSelectedStudents'])->name('admin.delete.selected.students');
        Route::delete('/admin/delete-selected-admins', [deleteSelected::class, 'deleteSelectedAdmins'])->name('admin.delete.selected.admins');
        Route::delete('/admin/delete-selected-teachers', [deleteSelected::class, 'deleteSelectedTeachers'])->name('admin.delete.selected.teachers');
        Route::delete('/admin/delete-selected-guidances', [deleteSelected::class, 'deleteSelectedGuidances'])->name('admin.delete.selected.guidances');
        Route::delete('/admin/delete-selected-subjects', [deleteSelected::class, 'deleteSelectedSubjects'])->name('admin.delete.selected.subjects');


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
            Route::get('/', [SubjectController::class, 'subject'])->name('admin.subject');
            Route::get('list', [SubjectController::class, 'subject_list'])->name('admin.subject_list');
            Route::get('create', [SubjectController::class, 'viewCreateSubject'])->name('admin.create.subject');
            Route::post('create', [SubjectController::class, 'createSubject'])->name('admin.handleCreate.subject');
            Route::delete('{id}', [SubjectController::class, 'deleteSubject'])->name('admin.delete.subject');
            Route::get('{id}/edit', [SubjectController::class, 'viewEditSubject'])->name('admin.edit.subject');
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
        // Add teacher-specific routes here
        Route::get('dashboard', [Teacher::class, 'dashboard'])->name('teacher.dashboard');




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
    });
});

// Student routes
Route::prefix('student')->group(function () {
    Route::get('login', [Student::class, 'login'])->name('student.login');
    Route::post('login', [Student::class, 'handleLogin'])->name('student.handleLogin');

    // for reset password
    Route::get('forgot-password', [StudentOtpController::class, 'request'])->name('student.password.request');
    Route::post('forgot-password', [StudentOtpController::class, 'sendOtp'])->name('student.password.otp');
    Route::get('reset-password', [StudentOtpController::class, 'reset'])->name('student.password.reset');
    Route::post('reset-password', [StudentOtpController::class, 'update'])->name('student.password.update');

    Route::get('verify-otp', [StudentOtpController::class, 'verifyFormOtp'])->name('student.verify-form.otp');

    Route::post('verify-otp', [StudentOtpController::class, 'verifyOtp'])->name('student.verify.otp');



    Route::middleware('auth:student')->group(function () {
        // Add Student-specific routes here
        Route::get('dashboard', [Student::class, 'dashboard'])->name('student.dashboard');

        // chat conversation
        Route::get('/chats', [StudentConversationController::class, 'index'])->name('student.chats.index');
        Route::get('/chats/messages', [StudentConversationController::class, 'loadMessages'])->name('student.chats.loadMessages');
        Route::post('/chats/send', [StudentConversationController::class, 'sendMessage']);
        Route::get('chats/counts', [StudentConversationController::class, 'getMessageCounts'])->name('student.get_message_count');


        // Student logout route
        Route::post('logout', [Student::class, 'logout'])->name('student.logout');

        // Student profile routes
        Route::prefix('profile')->group(function () {
            Route::get('/', [Student::class, 'profile'])->name('student.profile');
            Route::post('updatePhoto', [Student::class, 'updateProfilePhoto'])->name('student.updateProfilePhoto');
            Route::delete('deletePhoto', [Student::class, 'deleteProfilePhoto'])->name('student.deleteProfilePhoto');
            Route::put('updateAccount', [Student::class, 'updateAccount'])->name('student.updateAccount');
            Route::put('updatePassword', [Student::class, 'updatePassword'])->name('student.updatePassword');
        });
    });
});





// Guidance routes
Route::prefix('guidance')->group(function () {
    Route::get('login', [Guidance::class, 'login'])->name('guidance.login');
    Route::post('login', [Guidance::class, 'handleLogin'])->name('guidance.handleLogin');

    // for reset password
    Route::get('forgot-password', [GuidanceOtpController::class, 'request'])->name('guidance.password.request');
    Route::post('forgot-password', [GuidanceOtpController::class, 'sendOtp'])->name('guidance.password.otp');
    Route::get('reset-password', [GuidanceOtpController::class, 'reset'])->name('guidance.password.reset');
    Route::post('reset-password', [GuidanceOtpController::class, 'update'])->name('guidance.password.update');

    Route::get('verify-otp', [GuidanceOtpController::class, 'verifyFormOtp'])->name('guidance.verify-form.otp');

    Route::post('verify-otp', [GuidanceOtpController::class, 'verifyOtp'])->name('guidance.verify.otp');



    Route::middleware('auth:guidance')->group(function () {
        // Add Guidance-specific routes here
        Route::get('dashboard', [Guidance::class, 'dashboard'])->name('guidance.dashboard');


        // chat conversation
        Route::get('/chats', [GuidanceConversationController::class, 'index'])->name('guidance.chats.index');
        Route::get('/chats/messages', [GuidanceConversationController::class, 'loadMessages'])->name('guidance.chats.loadMessages');
        Route::post('/chats/send', [GuidanceConversationController::class, 'sendMessage']);
        Route::get('chats/counts', [GuidanceConversationController::class, 'getMessageCounts'])->name('guidance.get_message_count');


        // Guidance logout route
        Route::post('logout', [Guidance::class, 'logout'])->name('guidance.logout');

        // Guidance profile routes
        Route::prefix('profile')->group(function () {
            Route::get('/', [Guidance::class, 'profile'])->name('guidance.profile');
            Route::post('updatePhoto', [Guidance::class, 'updateProfilePhoto'])->name('guidance.updateProfilePhoto');
            Route::delete('deletePhoto', [Guidance::class, 'deleteProfilePhoto'])->name('guidance.deleteProfilePhoto');
            Route::put('updateAccount', [Guidance::class, 'updateAccount'])->name('guidance.updateAccount');
            Route::put('updatePassword', [Guidance::class, 'updatePassword'])->name('guidance.updatePassword');
        });
    });
});
