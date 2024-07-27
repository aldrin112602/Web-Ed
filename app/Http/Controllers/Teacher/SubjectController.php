<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\SubjectModel;

class SubjectController extends Controller
{
    public function index()
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
            $allSubjects = SubjectModel::where('teacher_id', $user->id)->get();
            $allStudentsCount = $this->countStudents();
            return view('teacher.subject.index', ['user' => $user, 'allSubjects' => $allSubjects, "allStudentsCount" => $allStudentsCount]);
        }

        return redirect()->route('teacher.login');
    }


    public function subjectList(Request $request) {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
            $query = SubjectModel::where('teacher_id', $user->id);

            $subject_list = $query->paginate(10);
            return view('teacher.subject.subject_list', ['user' => $user,'subject_list' => $subject_list]);
        }

        return redirect()->route('teacher.login');
    }


    public function countStudents() {
        $user = Auth::guard('teacher')->user();
        $subject = SubjectModel::where('teacher_id', $user->id)->first();
        $students = $subject->students()->count();
        return $students;
    }
}
