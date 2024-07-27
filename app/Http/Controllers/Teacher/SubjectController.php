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


    public function countStudents() {
        $user = Auth::guard('teacher')->user();
        $subject = SubjectModel::where('teacher_id', $user->id)->first();
        $students = $subject->students()->count();
        return $students;
    }
}
