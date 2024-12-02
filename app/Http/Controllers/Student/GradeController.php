<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\StudentAccount;
use App\Models\StudentGrade;
use Illuminate\{Http\Request,Support\Facades\Auth };

class GradeController extends Controller
{
    public function grades(Request $request, $id) {

        $grades = StudentGrade::where('student_id', ($id ?? Auth::id()))->get();
        $student = StudentAccount::where('id', $id ?? Auth::id())->first();
        
        return view('student.grade.grade', [
            'user' => Auth::user(),
            'grades' => $grades,
            'student' => $student
        ]);
    }

    public function viewGrades() {
        return view('student.grade.generate_grade', [
            'user' => Auth::user()
        ]);
    }
}
