<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherGradeHandle;

class StudentsGradeController extends Controller
{
    public $user, $handleSubjects;

    public function __construct()
    {
        $this->user = Auth::user();
        $this->handleSubjects = TeacherGradeHandle::where('teacher_id', $this->user->id)->get();
    }


    public function grading()
    {

        return view('teacher.students_grade.grading', [
            'user' => $this->user,
            'handleSubjects' => $this->handleSubjects,
        ]);
    }

    public function grading_sheet()
    {
        return view('teacher.students_grade.grading_sheet', [
            'user' => $this->user,
            'handleSubjects' => $this->handleSubjects,
        ]);
    }


    public function custom_grade()
    {
        return view('teacher.students_grade.custom_grade', [
            'user' => $this->user,
            'handleSubjects' => $this->handleSubjects,
        ]);
    }
}
