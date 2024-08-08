<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\QrGenerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QRCodeScanController extends Controller
{
    public function scanQRCode(Request $request)
    {
        // Authenticate student
        $studentId = Auth::id();

        // Decode QR code data (if needed, depending on API usage)
        // $dataWithSignature = json_decode($request->input('qr_code_data'), true);
        // $data = $dataWithSignature['data'];
        // $signature = $dataWithSignature['signature'];

        // Validate signature (if needed, depending on API usage)
        // $secretKey = config('app.key');
        // $calculatedSignature = hash_hmac('sha256', $data, $secretKey);
        // if ($calculatedSignature !== $signature) {
        //     return response()->json(['error' => 'Invalid QR code.'], 400);
        // }

        // Retrieve QR code details from request (if direct retrieval is possible)
        $attendanceId = $request->input('attendance_id');

        // Check if attendance record exists
        $attendance = QrGenerate::where('qr_code_id', $attendanceId)->first();

        if (!$attendance) {
            return response()->json(['error' => 'Invalid QR code data.'], 400);
        }

        // Mark attendance (if not already marked)
        if (!$attendance->is_marked) {
            $attendance->update([
                'student_id' => $studentId,
                'is_marked' => true,
            ]);

            return response()->json(['success' => 'Attendance marked successfully.'], 200);
        } else {
            return response()->json(['error' => 'Attendance already marked.'], 400);
        }
    }
}
