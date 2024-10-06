<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\GradingHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherGradeHandle;
use App\Models\StudentHandle;
use App\Models\Student\StudentAccount;


class StudentsGradeController extends Controller
{
    public $user, $handleSubjects, $allStudents, $allMaleStudents, $allFemaleStudents, $gradingHeaders;

    public function __construct()
    {
        $this->user = Auth::user();
        $this->handleSubjects = TeacherGradeHandle::where('teacher_id', $this->user->id)->get();
        
        $this->allStudents = StudentHandle::where('teacher_id', $this->user->id)->get();

        $this->allMaleStudents = StudentHandle::with('account')
            ->whereHas('account', function ($query) {
                $query->where('gender', 'Male');
            })->where('teacher_id', $this->user->id)->get();

        $this->allFemaleStudents = StudentHandle::with('account')
            ->whereHas('account', function ($query) {
                $query->where('gender', 'Female');
            })->where('teacher_id', $this->user->id)->get();



            // grading headers
            $this->gradingHeaders = GradingHeader::first();
    }





    public function grading()
    {
        return view('teacher.students_grade.grading', [
            'user' => $this->user,
            'handleSubjects' => $this->handleSubjects,
            'allStudents' => $this->allStudents,
            'allFemaleStudents' => $this->allFemaleStudents,
            'allMaleStudents' => $this->allMaleStudents,
            'StudentAccount' => StudentAccount::class,
            'gradingHeaders' => $this->gradingHeaders
        ]);
    }

    public function grading_sheet()
    {
        return view('teacher.students_grade.grading_sheet', [
            'user' => $this->user,
            'handleSubjects' => $this->handleSubjects,
            'allStudents' => $this->allStudents,
            'StudentAccount' => StudentAccount::class
        ]);
    }


    public function custom_grade()
    {
        return view('teacher.students_grade.custom_grade', [
            'user' => $this->user,
            'handleSubjects' => $this->handleSubjects,
            'allStudents' => $this->allStudents,
            'StudentAccount' => StudentAccount::class
        ]);
    }
}
