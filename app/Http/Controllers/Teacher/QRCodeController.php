<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\QrGenerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class QRCodeController extends Controller
{
    public function generateQRCode($subjectId, $teacherId)
    {
        // Generate a unique ID for the QR code
        $attendanceId = uniqid();

        // Set expiration time (e.g., 15 minutes from now)
        $expiration = now()->addMinutes(15)->timestamp;

        // Save attendance record with QR code ID
        QrGenerate::create([
            'subject_id' => $subjectId,
            'teacher_id' => $teacherId,
            'qr_code_id' => $attendanceId,
        ]);

        // Data to encode into QR code
        $data = json_encode([
            'attendance_id' => $attendanceId,
            'subject_id' => $subjectId,
            'teacher_id' => $teacherId,
            'expiration' => $expiration,
        ]);

        // URL-encode the data for inclusion in the query string
        $encodedData = urlencode($data);

        // Build the QR code API URL using quickchart.io
        $qrCodeUrl = "https://quickchart.io/qr?text={$encodedData}&size=400";

        // Download and save the QR code image
        $response = Http::get($qrCodeUrl);
        $imageContents = $response->body();
        $imagePath = storage_path("app/public/qrcode_{$attendanceId}.png");
        Storage::put("public/qrcode_{$attendanceId}.png", $imageContents);

        // Return the generated QR code as a response
        return response()->file($imagePath, ['Content-Type' => 'image/png']);
    }
}
