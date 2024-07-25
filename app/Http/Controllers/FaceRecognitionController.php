<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student\StudentAccount;

class FaceRecognitionController extends Controller
{
    public function showFaceRecognition()
    {
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

    public function getStudentInfo($label)
    {
        $student = StudentAccount::where('name', $label)->first();

        if ($student) {
            return response()->json([
                'name' => $student->name,
                'strand' => $student->strand,
                'id_number' => $student->id_number,
                'parents_contact_number' => $student->parents_contact_number,
            ]);
        } else {
            return response()->json(['message' => 'Student not found'], 404);
        }
    }
}
