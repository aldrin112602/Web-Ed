<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController as Student;
use App\Http\Controllers\Student\StudentOtpController;
use App\Http\Controllers\Student\StudentConversationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/


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


