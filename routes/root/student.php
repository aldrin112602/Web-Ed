<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\{
    QRCodeScanController,
    StudentController as Student,
    StudentOtpController,
    StudentConversationController,
    GradeController,
    StudentNotificationController
};


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


    /***
     * ///////////////////////////
     * /// MIDDLEWARE: TEACHER ///
     * ///////////////////////////
     */

    Route::middleware('auth:student')->group(function () {
        // Notification route
        Route::prefix('notifications')->group(function () {
            Route::get('/', [StudentNotificationController::class, 'index'])->name('student.notification');
            Route::post('/mark-all-as-read', [StudentNotificationController::class, 'markAllAsRead'])->name('student.notifications.markAllAsRead');
            Route::delete('/{id}', [StudentNotificationController::class, 'delete'])->name('student.notifications.delete');
            Route::delete('/', [StudentNotificationController::class, 'deleteSelected'])->name('student.deleteSelected.notifications');
        });


        // grades
        Route::get('grades', [GradeController::class, 'grades'])->name('student.grades');
        Route::get('viewGrades', [GradeController::class, 'viewGrades'])->name('student.viewGrades');


        // scan qr
        Route::post('/qr/scan', [QRCodeScanController::class, 'scanQRCode'])->name('qr.scan');
        Route::get('/qr/scan', [QRCodeScanController::class, 'scanQRCodeGet'])->name('qr.scan.get');


        // attendance history
        Route::get('attendance_history', [Student::class, 'attendanceHistory'])->name('student.attendance_history');

        // enrolled subjects
        Route::get('enrolled_subjects', [Student::class, 'enrolledSubjects'])->name('student.enrolled_subjects');


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
