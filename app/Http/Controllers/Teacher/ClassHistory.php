<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherGradeHandle;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentHandle;
use App\Models\QrGenerate;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\SubjectModel;
use App\Models\Teacher\TeacherAccount;

class ClassHistory extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();

            $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();
            $allStudentsCount = count(StudentHandle::where('teacher_id', $user->id)->get());

            // Simplified query
            $qrHistory = QrGenerate::where('teacher_id', $user->id)
                ->whereIn('id', function ($query) use ($user) {
                    $query->select(DB::raw('MIN(id)'))
                        ->from('qr_generates')
                        ->where('teacher_id', $user->id)
                        ->groupBy(
                            DB::raw('DATE(created_at)'),
                            'subject_id'
                        );
                })
                ->orderBy('created_at', 'desc')
                ->get();

            // Get subject details for each QR code
            foreach ($qrHistory as $history) {
                $history->subjectDetails = SubjectModel::where('id', $history->subject_id)->where('teacher_id', Auth::id())->first();
            }

            return view(
                'teacher.class_history.index',
                [
                    'user' => $user,
                    'handleSubjects' => $handleSubjects,
                    "allStudentsCount" => $allStudentsCount,
                    "qrHistory" => $qrHistory,
                ]
            );
        }

        return redirect()->route('teacher.login');
    }

    public function view_class_history(Request $request, $id)
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();

            $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();
            $allStudentsCount = count(StudentHandle::where('teacher_id', $user->id)->get());

            $subject = SubjectModel::where('teacher_id', Auth::id())
            ->where('id', $id)->first();

            return view(
                'teacher.class_history.view_class_history',
                [
                    'user' => $user,
                    'handleSubjects' => $handleSubjects,
                    "allStudentsCount" => $allStudentsCount,
                    "subject" => $subject
                ]
            );
        }

        return redirect()->route('teacher.login');
    }
}
