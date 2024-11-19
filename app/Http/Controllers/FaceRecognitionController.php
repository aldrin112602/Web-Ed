<?php

namespace App\Http\Controllers;

use App\Models\Student\StudentAccount;
use App\Models\Admin\FaceRecognitionKey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FaceRecognitionController extends Controller
{
    // view pattern blade
    public function viewPattern() 
    {
        if (Session::get('authenticated_user')) {
            return redirect()->route('face.recognition');
        }
        
        return view('pattern_authentication');
    }
    
    // pattern methods
    public function createPattern(Request $request)
    {
        $request->validate([
            'pattern' => 'required|string',
        ]);

        $patternKey = FaceRecognitionKey::create([
            'pattern' => $request->pattern,
            'created_by_admin_id' => Auth::id(),
        ]);

        return response()->json([
            'message' => 'Pattern created successfully!',
            'data' => $patternKey,
        ]);
    }

    // pattern validation
    public function validatePattern(Request $request)
    {
        $request->validate([
            'pattern' => 'required|string',
        ]);

        $patternKey = FaceRecognitionKey::first();

        if (Hash::check($request->pattern, $patternKey->pattern)) {

            // Pattern matches
            Session::put('authenticated_user', true);

            return response()->json(['message' => 'Pattern validated successfully!']);
        } else {
            // Pattern doesn't match
            return response()->json(['message' => 'Invalid pattern.'], 403);
        }
    }





    public function showFaceRecognition()
    {
        if (!Session::get('authenticated_user')) {
            return redirect()->route('face.recognition.pattern_auth');
        }
        
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
                'id' => $student->id,
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
