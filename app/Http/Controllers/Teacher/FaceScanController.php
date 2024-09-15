<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherGradeHandle;
use App\Models\Student\StudentAccount;

class FaceScanController extends Controller
{
    public function index(Request $request) {



        $user = Auth::guard('teacher')->user();
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();
        $query = StudentAccount::query();


        // Apply gender filter
        if ($request->has('gender') && $request->gender != ''  && $request->gender != 'All') {
            $query->where('gender', $request->gender);
        }

        // Apply strand filter
        if ($request->has('strand') && $request->strand != ''  && $request->strand != 'All') {
            $query->where('strand', $request->strand);
        }

        // Apply grade filter
        if ($request->has('grade') && $request->grade != ''  && $request->grade != 'All') {
            $query->where('grade', $request->grade);
        }

        $account_list = $query->paginate(10);




        return view('teacher.facescan.index', 
        [
            'user' => $user,
            'account_list' => $account_list,
            'handleSubjects' => $handleSubjects
        ]
    );
    }
}
