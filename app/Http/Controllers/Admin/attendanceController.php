<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\StudentAccount;
use Illuminate\Http\Request;
use App\Models\Student\AttendanceHistory;
use App\Models\TeacherGradeHandle;
use App\Models\Admin\SubjectModel;
use App\Models\FaceScan;
use App\Models\Teacher\TeacherAccount;



class attendanceController extends Controller
{

    public function attendaceReport(Request $request)
    {
        $user = Auth::guard('admin')->user();

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


        return view('admin.attendance.report', [
            'user' => $user,
            'account_list' => $account_list
        ]);
    }


    public function viewAttendanceHistory($id)
    {
        $user = Auth::guard('admin')->user();
        $attendace_histories = AttendanceHistory::where('student_id', $id)->get();
        return view('admin.attendance.view_attendance_history', [
            'user' => $user,
            'attendace_histories' => $attendace_histories,
            'TeacherGradeHandle' => TeacherGradeHandle::class,
            'SubjectModel' => SubjectModel::class,
            'TeacherAccount' => TeacherAccount::class,
            'student' => StudentAccount::where('id', $id)->first()
        ]);
    }



    public function attendaceAbsent(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $scannedStudentIds = FaceScan::pluck('student_id')->toArray();

        $query = StudentAccount::query()->whereNotIn('id', $scannedStudentIds);


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


        $studentsWithoutFaceScan = $query->paginate(10);
        return view('admin.attendance.absent', [
            'user' => $user,
            'studentsWithoutFaceScan' => $studentsWithoutFaceScan
        ]);
    }

    public function attendacePresent()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.attendance.present', [
            'user' => $user,
            'presents' => FaceScan::paginate(10),
            'StudentAccount' => StudentAccount::class
        ]);
    }
}
