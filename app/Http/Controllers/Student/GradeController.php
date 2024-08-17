<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\{Http\Request,Support\Facades\Auth };

class GradeController extends Controller
{
    public function grades() {
        return view('student.grade.grade', [
            'user' => Auth::user()
        ]);
    }

    public function viewGrades() {
        return view('student.grade.generate_grade', [
            'user' => Auth::user()
        ]);
    }
}
