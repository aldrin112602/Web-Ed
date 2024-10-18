<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PublicController,
    FaceRecognitionController
};
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    $guards = [
        'admin' => 'admin.dashboard',
        'teacher' => 'teacher.dashboard',
        'student' => 'student.dashboard',
        'guidance' => 'guidance.dashboard'
    ];

    foreach ($guards as $guard => $route) {
        if (Auth::guard($guard)->check()) {
            return redirect()->route($route);
        }
    }


    return view('welcome');
});



Route::get('/face_recognition', [FaceRecognitionController::class, 'showFaceRecognition'])->name('face.recognition');
Route::post('/face_recognition', [PublicController::class, 'faceScanAttendance'])->name('face.attendance');

Route::get('/face_recognition/student-labels', [FaceRecognitionController::class, 'getStudentLabels'])->name('fetch_labels');
Route::get('/face_recognition/student-info/{label}', [FaceRecognitionController::class, 'getStudentInfo']);
Route::get('/login', [PublicController::class, 'login'])->name('login');
