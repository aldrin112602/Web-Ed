<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentGrade;
use Illuminate\{Http\Request,Support\Facades\Auth };

class GradeController extends Controller
{
    public function grades() {

        $grades = StudentGrade::where('student_id', Auth::id())->get();
        
        return view('student.grade.grade', [
            'user' => Auth::user(),
            'grades' => $grades
        ]);
    }

    public function viewGrades() {
        return view('student.grade.generate_grade', [
            'user' => Auth::user()
        ]);
    }
}
