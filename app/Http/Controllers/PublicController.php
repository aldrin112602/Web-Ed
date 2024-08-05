<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\AdminAccount;
use App\Models\FaceScan;
use App\Rules\TwoWords;
use Illuminate\Support\Carbon;

// For testing use only

class PublicController extends Controller
{

    public function faceScanAttendance(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:student_accounts,id'
        ]);

        $today = Carbon::today();

        // Check if there's already an attendance record for the student for today
        $existingAttendance = FaceScan::where('student_id', $request->student_id)
            ->whereDate('created_at', $today)
            ->exists();

        if ($existingAttendance) {
            return response()->json([
                'success' => false,
                'message' => 'Attendance already recorded for today',
            ]);
        }

        FaceScan::create([
            'student_id' => $request->student_id,
            'time' => Carbon::now()->format('H:i:s'),
        ]);

        return response()->json([
            'success' => true,
            'student_id' => $request->student_id,
        ]);
    }




    public function login()
    {
        return redirect()->intended('/');
    }

    public function faceRecognition()
    {
        return view('face-recognition');
    }


    public function createAdmin(Request $request)
    {
        $request->validate([
            'id_number' => 'required|min:5|max:255|unique:admin_accounts,id_number',
            'name' => ['required', 'string', 'max:255', new TwoWords],
            'gender' => 'required|string|in:Male,Female',
            'username' => 'required|string|unique:admin_accounts,username',
            'password' => 'required|string|min:6|max:255',
            'email' => 'nullable|email|unique:admin_accounts,email',
            'position' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif',
            'phone_number' => 'nullable|string|min:11|max:11'
        ]);

        $account = new AdminAccount($request->all());

        $profilePath = $request->file('profile')->store('profiles', 'public');
        $account->profile = $profilePath;

        $account->save();

        return redirect()
            ->back()
            ->with('success', 'Account added successfully!');
    }
}
