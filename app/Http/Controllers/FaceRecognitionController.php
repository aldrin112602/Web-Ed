<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student\StudentAccount;

class FaceRecognitionController extends Controller
{
    public function showFaceRecognition() {
        return view('face_recognition');
    }

    public function getStudentLabels()
    {
        $students = StudentAccount::all();
        $labels = $students->map(function ($student) {
            return $student->name;
        });

        return response()->json($labels);
    }
}
