<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\{QrGenerate, TeacherGradeHandle, StudentHandle};
use Illuminate\Support\Facades\Auth;

class QRCodeController extends Controller
{
    public function generateQRCode($subjectId, $teacherId)
    {

        $attendanceId = uniqid();
        $user = Auth::guard('teacher')->user();
        $expiration = now()->addMinutes(15)->timestamp;
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();
        $grade_handle = TeacherGradeHandle::where('id', $user->id)->first();
        $allStudentsCount = count(StudentHandle::where('teacher_id', $user->id)->get());

        QrGenerate::create([
            'subject_id' => $subjectId,
            'teacher_id' => $teacherId,
            'qr_code_id' => $attendanceId,
        ]);

        $data = json_encode([
            'attendance_id' => $attendanceId,
            'subject_id' => $subjectId,
            'teacher_id' => $teacherId,
            'expiration' => $expiration,
            'grade_handle_id' => $grade_handle->id,
        ]);

        return view('teacher.subject.qr_generate', [
            'data' => $data,
            'handleSubjects' => $handleSubjects,
            'grade_handle' => $grade_handle,
            'user' => $user,
            'allStudentsCount' => $allStudentsCount,
        ]);
    }
}
