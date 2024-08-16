<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\QrGenerate;
use Illuminate\{Http\Request, Support\Facades\Auth};

class QRCodeScanController extends Controller
{
    public function scanQRCode(Request $request)
    {
        // Authenticate student
        $studentId = Auth::id();

        // Retrieve QR code details from request
        $data = $request->input('qr_code_data');
        $decodedData = json_decode($data, true);

        // Debug: Log the decoded data
        \Log::info("Decoded data: " . print_r($decodedData, true));

        if (!$decodedData) {
            return response()->json(['error' => 'Invalid QR code data.'], 400);
        }

        $attendanceId = $decodedData['attendance_id'];

        // Check if attendance record exists
        $attendance = QrGenerate::where('qr_code_id', $attendanceId)->first();

        if (!$attendance) {
            return response()->json(['error' => 'Invalid QR code data.'], 400);
        }

        $decodedData = json_decode($data, true);

        // Check expiration
        if (now()->timestamp > $decodedData['expiration']) {
            return response()->json(['error' => 'QR code has expired.'], 400);
        }


        return response()->json(['success' => 'Attendance marked successfully.'], 200);
    }


    public function scanQRCodeGet()
    {
        return view('student.qr_scan');
    }
}
