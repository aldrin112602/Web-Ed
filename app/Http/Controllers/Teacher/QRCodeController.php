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

        // Sign the data with a secret key (optional, depending on API usage)
        // $secretKey = config('app.key');
        // $signature = hash_hmac('sha256', $data, $secretKey);
        // $dataWithSignature = json_encode([
        //     'data' => $data,
        //     'signature' => $signature,
        // ]);

        $encodedData = urlencode($data);

        // Build the QR code API URL
        $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=400x400&data={$encodedData}";

        // Download and save the QR code image
        $response = Http::get($qrCodeUrl);
        $imageContents = $response->body();
        $imagePath = storage_path("app/public/qrcode_{$attendanceId}.png");
        Storage::put("public/qrcode_{$attendanceId}.png", $imageContents);

        // Return the generated QR code as a response
        return response()->file($imagePath, ['Content-Type' => 'image/png']);
    }
}
