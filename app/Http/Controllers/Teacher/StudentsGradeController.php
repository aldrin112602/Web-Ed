<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\GradingHeader;
use App\Models\HighestPossibleScoreGradingSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherGradeHandle;
use App\Models\StudentHandle;
use App\Models\Student\StudentAccount;
use App\Models\StudentGrade;

class StudentsGradeController extends Controller
{
    public $user,
        $handleSubjects,
        $allStudents,
        $allMaleStudents,
        $allFemaleStudents,
        $gradingHeaders,
        $gradeHandles,
        $studentGrades;

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

        $this->gradeHandles = TeacherGradeHandle::where('teacher_id', $this->user->id)
            ->distinct()
            ->get(['grade', 'section', 'strand']);

        $this->studentGrades = StudentGrade::where('teacher_id', $this->user->id)->get();
    }




    public function grading(Request $request)
    {

        $grades = TeacherGradeHandle::where('teacher_id', $this->user->id)
            ->distinct()
            ->pluck('grade');

        $strands = TeacherGradeHandle::where('teacher_id', $this->user->id)
            ->when($request->filled('grade'), function ($query) use ($request) {
                $query->where('grade', $request->grade);
            })
            ->distinct()
            ->pluck('strand');

        $sections = TeacherGradeHandle::where('teacher_id', $this->user->id)
            ->when($request->filled('grade'), function ($query) use ($request) {
                $query->where('grade', $request->grade);
            })
            ->when($request->filled('strand'), function ($query) use ($request) {
                $query->where('strand', $request->strand);
            })
            ->distinct()
            ->pluck('section');

        $allStudents = collect();
        $allMaleStudents = collect();
        $allFemaleStudents = collect();
        $studentGrades = collect();
        $highestPossibleScores = HighestPossibleScoreGradingSheet::where('teacher_id', $this->user->id)->first();

        if ($request->filled('section')) {

            $studentQuery = StudentHandle::with('account')
                ->join('teacher_grade_handles', 'student_handles.grade_handle_id', '=', 'teacher_grade_handles.id')
                ->select('student_handles.*', 'teacher_grade_handles.grade', 'teacher_grade_handles.strand', 'teacher_grade_handles.section')
                ->where('student_handles.teacher_id', $this->user->id);

            if ($request->filled('grade')) {
                $studentQuery->where('teacher_grade_handles.grade', $request->grade);
            }
            if ($request->filled('strand')) {
                $studentQuery->where('teacher_grade_handles.strand', $request->strand);
            }
            if ($request->filled('section')) {
                $studentQuery->where('teacher_grade_handles.section', $request->section);
            }

            $allStudents = $studentQuery->get();
            $allMaleStudents = $allStudents->filter(function ($student) {
                return $student->account->gender === 'Male';
            });

            $allFemaleStudents = $allStudents->filter(function ($student) {
                return $student->account->gender === 'Female';
            });

            $studentIds = $allStudents->pluck('id');
            $studentGrades = StudentGrade::whereIn('student_id', $studentIds)
                ->where('teacher_id', $this->user->id)
                ->get();
        }

        return view('teacher.students_grade.grading', [
            'user' => $this->user,
            'handleSubjects' => $this->handleSubjects,
            'allStudents' => $allStudents,
            'allFemaleStudents' => $allFemaleStudents,
            'allMaleStudents' => $allMaleStudents,
            'StudentAccount' => StudentAccount::class,
            'gradingHeaders' => $this->gradingHeaders,
            'strands' => $strands,
            'sections' => $sections,
            'grades' => $grades,
            'highestPossibleScores' => $highestPossibleScores,
            'studentGrades' => $studentGrades
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
