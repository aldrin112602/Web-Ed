<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\{QrGenerate, TeacherGradeHandle, StudentHandle};
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\SubjectModel;
use App\Models\Student\StudentAccount;

class QRCodeController extends Controller
{
    public function generateQRCode($subjectId, $teacherId)
    {
        // Generate a unique attendance ID for this QR code session
        $attendanceId = uniqid();

        // Get the authenticated teacher user
        $user = Auth::guard('teacher')->user();

        // Set the expiration time for the QR code (15 minutes from now)
        $expiration = now()->addMinutes(15)->timestamp;

        // Get all subjects handled by the teacher
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();

        // Get the first grade handle for the teacher (assuming the teacher handles multiple grades)
        $grade_handle = TeacherGradeHandle::where('teacher_id', $user->id)->first();

        // Retrieve all student handles associated with the teacher
        $studentsHandle = StudentHandle::where('teacher_id', $user->id)->get();

        // Retrieve all student accounts where the student ID is in the student handles
        $studentIds = $studentsHandle->pluck('student_id'); // Assuming StudentHandle has 'student_id' column
        $students = StudentAccount::whereIn('id', $studentIds)->get();

        $allStudentsCount = $students->count();

        // Store the QR code generation details in the database
        QrGenerate::create([
            'subject_id' => $subjectId,
            'teacher_id' => $teacherId,
            'qr_code_id' => $attendanceId,
        ]);

        // Prepare data to be encoded in the QR code
        $data = json_encode([
            'attendance_id' => $attendanceId,
            'subject_id' => $subjectId,
            'teacher_id' => $teacherId,
            'expiration' => $expiration,
            'grade_handle_id' => $grade_handle->id,
        ]);

        // Retrieve the subject details for this QR code session
        $subject = SubjectModel::where('id', $subjectId)
            ->where('teacher_id', $teacherId)
            ->first();

        // Return the view with all necessary data for rendering
        return view('teacher.subject.qr_generate', [
            'data' => $data,
            'handleSubjects' => $handleSubjects,
            'grade_handle' => $grade_handle,
            'user' => $user,
            'allStudentsCount' => $allStudentsCount,
            'students' => $students,
            'subject' => $subject
        ]);
    }
}
