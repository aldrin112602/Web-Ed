<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Teacher\{
    Announcement,
    GradeHandleController,
    StudentController,
    Account,
    Attendance,
    QRCodeController,
    TeacherController as Teacher,
    TeacherOtpController,
    TeacherConversationController,
    SubjectController as Subject,
    Present,
    StudentsGradeController,
    TeacherNotificationController
};

// Teacher routes
Route::prefix('teacher')->group(function () {
    // login handle
    Route::get('login', [Teacher::class, 'login'])->name('teacher.login');
    Route::post('login', [Teacher::class, 'handleLogin'])->name('teacher.handleLogin');
    // for reset password/ FORGOT Password
    Route::get('forgot-password', [TeacherOtpController::class, 'request'])->name('teacher.password.request');
    Route::post('forgot-password', [TeacherOtpController::class, 'sendOtp'])->name('teacher.password.otp');
    Route::get('reset-password', [TeacherOtpController::class, 'reset'])->name('teacher.password.reset');
    Route::post('reset-password', [TeacherOtpController::class, 'update'])->name('teacher.password.update');
    Route::get('verify-otp', [TeacherOtpController::class, 'verifyFormOtp'])->name('teacher.verify-form.otp');
    Route::post('verify-otp', [TeacherOtpController::class, 'verifyOtp'])->name('teacher.verify.otp');

    /***
     * ///////////////////////////
     * /// MIDDLEWARE: TEACHER ///
     * ///////////////////////////
     */
    Route::middleware('auth:teacher')->group(function () {
        // Notification route
        Route::get('/notifications', [TeacherNotificationController::class, 'index'])->name('teacher.notification');
        Route::post('notifications/mark-all-as-read', [TeacherNotificationController::class, 'markAllAsRead'])->name('teacher.notifications.markAllAsRead');

        // students grade
        Route::get('grading', [StudentsGradeController::class, 'grading'])->name('teacher.grading');
        Route::get('custom_grade', [StudentsGradeController::class, 'custom_grade'])->name('teacher.custom_grade');
        Route::get('grading_sheet', [StudentsGradeController::class, 'grading_sheet'])->name('teacher.grading_sheet');


        // for announcement
        Route::post('announcement', [Announcement::class, 'makeAnnouncement'])->name('teacher.make_announcement');


        Route::prefix('student')->group(function () {
            // view student subjects
            Route::get('subjects/{id}', [Subject::class, 'viewStudentSubjects'])->name('teacher.view.subjects');
            Route::post('subjects/add', [Subject::class, 'addSubject'])->name('teacher.add.subject');
            Route::delete('subjects/delete/{studentId}/{subjectId}', [Subject::class, 'deleteStudentSubject'])->name('teacher.delete.studentSubject');

            // Update, delete student account
            Route::delete('{id}', [StudentController::class, 'deleteStudent'])->name('teacher.delete.student');
            Route::get('{id}/edit', [StudentController::class, 'editStudent'])->name('teacher.edit.student');
            Route::put('{id}', [StudentController::class, 'updateStudent'])->name('teacher.update.student');
        });

        // generate qr code
        Route::get('/generate-qr-code/{subjectId}/{teacherId}', [QRCodeController::class, 'generateQRCode'])->name('generateQR');
        Route::post('/getPresentCount', [Present::class, 'presentCount'])->name('getPresentCount');
        Route::post('/getAbsentCount', [Present::class, 'absentCount'])->name('getAbsentCount');



        // present and absent
        Route::get('/presents', [Attendance::class, 'presents'])->name('teacher.attendance.presents');
        Route::get('/absents', [Attendance::class, 'absents'])->name('teacher.attendance.absents');



        // deleting selected students account
        Route::delete('/delete-selected-students', [Account::class, 'deleteSelectedStudents'])->name('teacher.delete.selected.students');

        // delete student single account
        Route::delete('delete_student', [Account::class, 'deleteStudentAccount'])->name('teacher.delete.student');

        // adding student
        Route::get('/add_student', [Account::class, 'viewAddStudent'])->name('teacher.add.student');
        Route::post('/add_student', [Account::class, 'submitAddStudent'])->name('teacher.submit.student');

        // dashboard
        Route::get('dashboard', [Teacher::class, 'dashboard'])->name('teacher.dashboard');


        // Student list
        Route::get('/student_list', [StudentController::class, 'index'])->name('teacher.student_list');


        // Grade handle routes
        Route::get('grade_handle/add', [GradeHandleController::class, 'viewAddHandleGrade'])->name('teacher.view.add_grade_handle');
        Route::post('grade_handle/add', [GradeHandleController::class, 'submitAddHandleGrade'])->name('teacher.submit.add_grade_handle');
        Route::get('grade_handle/edit/{id}', [GradeHandleController::class, 'viewUpdateGradeHandle'])->name('teacher.edit.grade_handle');
        Route::put('grade_handle/update/{id}', [GradeHandleController::class, 'updateGradeHandle'])->name('teacher.update.grade_handle');
        Route::delete('grade_handle/delete', [GradeHandleController::class, 'deleteGradeHandle'])->name('teacher.delete.grade_handle');


        // subject list
        Route::get('/subject_list', [Subject::class, 'subjectList'])->name('teacher.subject_list');


        // Subject routes
        Route::get('/my_subjects', [Subject::class, 'index'])->name('teacher.subjects');
        Route::prefix('subject')->group(function () {
            Route::get('create', [Subject::class, 'viewCreateSubject'])->name('teacher.create.subject');
            Route::post('create', [Subject::class, 'createSubject'])->name('teacher.handleCreate.subject');
            Route::delete('{id}', [Subject::class, 'deleteSubject'])->name('teacher.delete.subject');
            Route::get('{id}/edit', [Subject::class, 'viewEditSubject'])->name('teacher.edit.subject');
            Route::put('{id}', [Subject::class, 'updateSubject'])->name('teacher.update.subject');
        });

        // delete selected subjects
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


        // export subjects list
        Route::prefix('export')->group(function () {
            Route::get('subject_list', [ExcelController::class, 'exportTeacherSubjectList'])->name('teacher.export.subject');
        });
    });
});
