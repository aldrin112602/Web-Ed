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


class StudentsGradeController extends Controller
{
    public $user,
        $handleSubjects,
        $allStudents,
        $allMaleStudents,
        $allFemaleStudents,
        $gradingHeaders,
        $gradeHandles;

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
    }




    public function grading(Request $request)
    {
        // Get distinct grades, strands, and sections for the dropdowns
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

        // Initialize variables to hold the students
        $allStudents = collect();
        $allMaleStudents = collect();
        $allFemaleStudents = collect();
        $highestPossibleScores = HighestPossibleScoreGradingSheet::where('teacher_id', $this->user->id)->first();

        // Only query students if the section is filled
        if ($request->filled('section')) {
            // Start building the student query with eager loading for the account relationship
            $studentQuery = StudentHandle::with('account') // Eager load 'account'
                ->join('teacher_grade_handles', 'student_handles.grade_handle_id', '=', 'teacher_grade_handles.id')
                ->select('student_handles.*', 'teacher_grade_handles.grade', 'teacher_grade_handles.strand', 'teacher_grade_handles.section')
                ->where('student_handles.teacher_id', $this->user->id);

            // Apply filters
            if ($request->filled('grade')) {
                $studentQuery->where('teacher_grade_handles.grade', $request->grade);
            }
            if ($request->filled('strand')) {
                $studentQuery->where('teacher_grade_handles.strand', $request->strand);
            }
            if ($request->filled('section')) {
                $studentQuery->where('teacher_grade_handles.section', $request->section);
            }

            // Get the filtered students
            $allStudents = $studentQuery->get();

            // Filter male and female students based on the filtered students
            $allMaleStudents = $allStudents->filter(function ($student) {
                return $student->account->gender === 'Male';
            });

            $allFemaleStudents = $allStudents->filter(function ($student) {
                return $student->account->gender === 'Female';
            });
        }

        // Return the view with the necessary data
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
            'highestPossibleScores' => $highestPossibleScores
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
