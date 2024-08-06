<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\FaceRecognitionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/face_recognition', [FaceRecognitionController::class, 'showFaceRecognition'])->name('face.recognition');
Route::post('/face_recognition', [PublicController::class, 'faceScanAttendance'])->name('face.attendance');

Route::get('/face_recognition/student-labels', [FaceRecognitionController::class, 'getStudentLabels'])->name('fetch_labels');
Route::get('/face_recognition/student-info/{label}', [FaceRecognitionController::class, 'getStudentInfo']);
Route::get('/login', [PublicController::class, 'login'])->name('login');
