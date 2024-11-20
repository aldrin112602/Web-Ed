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

    public function setPattern()
    {
        $pattern = FaceRecognitionKey::first();

        return view('admin.face_recognition.set_pattern_auth', [
            'pattern' => $pattern,
            'user' => Auth::user()
        ]);
    }

    // pattern methods
    public function createPattern(Request $request)
    {
        $request->validate([
            'pattern' => 'required|string',
            'image' => 'required|string',
        ]);

        // Decode the Base64 image
        $image = $request->input('image');
        $image = str_replace('data:image/png;base64,', '', $image); // Remove Base64 header
        $image = str_replace(' ', '+', $image); // Replace spaces with plus signs
        $decodedImage = base64_decode($image);

        // Define the target directory and file name
        $destinationPath = public_path('storage/pattern_images');
        $imageName = 'pattern_' . time() . '.png';

        // Check if the directory exists, if not, create it
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        // Save the file in the target directory
        $filePath = $destinationPath . '/' . $imageName;
        file_put_contents($filePath, $decodedImage);

        // Build the relative file path for database storage
        $relativePath = 'pattern_images/' . $imageName;

        // Check if a pattern already exists for the current admin
        $existingPattern = FaceRecognitionKey::first();

        if ($existingPattern) {
            // Update the existing pattern
            $existingPattern->update([
                'pattern' => $request->pattern,
                'image_path' => $relativePath,
                'updated_by_admin_id' => Auth::id(),
            ]);

            return response()->json([
                'message' => 'Pattern updated successfully!',
                'data' => $existingPattern,
                'success' => true,
            ]);
        } else {
            // Create a new pattern
            $patternKey = FaceRecognitionKey::create([
                'pattern' => $request->pattern,
                'image_path' => $relativePath,
                'created_by_admin_id' => Auth::id(),
            ]);

            return response()->json([
                'message' => 'Pattern created successfully!',
                'data' => $patternKey,
                'success' => true,
            ]);
        }
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

            return response()->json(['message' => 'Pattern validated successfully!', 'success' => true]);
        } else {
            // Pattern doesn't match
            return response()->json(['message' => 'Invalid pattern.', 'success' => false], 403);
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
