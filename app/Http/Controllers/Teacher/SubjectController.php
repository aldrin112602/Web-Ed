<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\SubjectModel;

class SubjectController extends Controller
{
    public static function index()
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
            $allSubjects = SubjectModel::where('teacher_id', $user->id)->get();
            return view('teacher.subject.index', ['user' => $user, 'allSubjects' => $allSubjects]);
        }

        return redirect()->route('teacher.login');
    }
}
