<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\FaceScan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherGradeHandle;
use App\Models\Student\StudentAccount;
use Carbon\Carbon; // Import Carbon

class FaceScanController extends Controller
{
    public function index(Request $request) {

        // Get the authenticated teacher
        $user = Auth::guard('teacher')->user();

        // Get the subjects/grades handled by the teacher
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();

        // Retrieve face scanned students (with student_id, time, and created_at)
        $faceScans = FaceScan::select('student_id', 'time', 'created_at')->get();

        // Extract the student IDs
        $face_scanned_student_ids = $faceScans->pluck('student_id');

        // Initialize query for StudentAccount, filtering for face scanned students and handled by the teacher
        $query = StudentAccount::whereIn('id', $face_scanned_student_ids)
            ->whereIn('grade', $handleSubjects->pluck('grade'));

        // Apply gender filter
        if ($request->has('gender') && $request->gender != '' && $request->gender != 'All') {
            $query->where('gender', $request->gender);
        }

        // Apply strand filter
        if ($request->has('strand') && $request->strand != '' && $request->strand != 'All') {
            $query->where('strand', $request->strand);
        }

        // Apply grade filter
        if ($request->has('grade') && $request->grade != '' && $request->grade != 'All') {
            $query->where('grade', $request->grade);
        }

        // Paginate the filtered student list
        $account_list = $query->paginate(10);

        // Merge face scan data with the student list for display
        $account_list->map(function($student) use ($faceScans) {
            $scan = $faceScans->firstWhere('student_id', $student->id);
            if ($scan) {
                // Format the time_in and created_at using Carbon for AM/PM format
                $student->time_in = Carbon::parse($scan->time)->format('h:i A');
                $student->scan_created_at = Carbon::parse($scan->created_at)->format('Y-m-d h:i A');
            } else {
                $student->time_in = null;
                $student->scan_created_at = null;
            }
            return $student;
        });

        // Return the view with relevant data
        return view('teacher.facescan.index', [
            'user' => $user,
            'account_list' => $account_list,
            'handleSubjects' => $handleSubjects
        ]);
    }
}
