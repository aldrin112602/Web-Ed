<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\QrGenerate;
use Illuminate\Support\Facades\{Http, Storage};

class QRCodeController extends Controller
{
    public function generateQRCode($subjectId, $teacherId)
    {

        $attendanceId = uniqid();
        $expiration = now()->addMinutes(15)->timestamp;

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
        ]);

        $encodedData = urlencode($data);
        $qrCodeUrl = "https://quickchart.io/qr?text={$encodedData}&size=400";

        $response = Http::get($qrCodeUrl);
        $imageContents = $response->body();
        $imagePath = storage_path("app/public/qrcode_{$attendanceId}.png");
        Storage::put("public/qrcode_{$attendanceId}.png", $imageContents);

        return response()->file($imagePath, ['Content-Type' => 'image/png']);
    }
}
