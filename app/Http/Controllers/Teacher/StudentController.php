<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherGradeHandle;
use App\Models\Student\StudentAccount;

class StudentController extends Controller
{
    // return the list of all students
    public function index(Request $request)
    {
        $user = Auth::user();
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();

        $id = $request->query('id');
        \Log::info('Grade Handle ID:', ['id' => $id]);

        if (!$id || !TeacherGradeHandle::find($id)) {
            return redirect()->route('teacher.dashboard')->with('error', 'Invalid grade handle ID');
        }

        account_list

        

        return view('teacher.students.index', [
            'user' => $user,
            'id' => $id,
            'handleSubjects' => $handleSubjects,
            'account_list' => $account_list,
            'grade_handle' => $grade_handle
        ]);
    }
}
