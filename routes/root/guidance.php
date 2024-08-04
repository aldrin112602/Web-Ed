<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guidance\GuidanceController as Guidance;
use App\Http\Controllers\Guidance\GuidanceOtpController;
use App\Http\Controllers\Guidance\GuidanceConversationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/


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

        // attendance report
        Route::get('attendance_report', [Guidance::class, 'attendanceReport'])->name('guidance.attendance_report');


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