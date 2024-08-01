<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\StudentSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherGradeHandle;

class StudentController extends Controller
{
    // return the list of all students
    public function index(Request $request)
    {
        $user = Auth::user();
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();

        $id = request()->query('id');

        if (!$id || !TeacherGradeHandle::find($id)) {
            return redirect()->route('teacher.dashboard')->with('error', 'Invalid grade handle ID');
        }

        $account_list = StudentSubject::where('teacher_id', $user->id)->where('grade_handle_id', $id)->get();

        return view('teacher.students.index', [
            'user' => $user,
            'id' => $id,
            'handleSubjects' => $handleSubjects,
            'account_list' => $account_list
        ]);
    }
}
