<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\{Spreadsheet, Writer\Xlsx};
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Student\{AttendanceHistory, StudentAccount};
use App\Models\Teacher\TeacherAccount;
use App\Models\Admin\SubjectModel;


class ExportController extends Controller
{
    public function exportAttendanceHistory($id) {
        
        $attendanceList = AttendanceHistory::where('student_id', $id)->get();


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header
        $sheet->setCellValue('A1', 'Date');
        $sheet->setCellValue('B1', 'Day');
        $sheet->setCellValue('C1', 'Subject');
        $sheet->setCellValue('D1', 'Teacher');
        $sheet->setCellValue('E1', 'Time');
        $sheet->setCellValue('F1', 'Time-In');
        $sheet->setCellValue('G1', 'Status');

        // Populate data
        $row = 2;

        foreach ($attendanceList as $attendance) {
            $subject = SubjectModel::where('id', $attendance->subject_model_id)->first();
            $teacher = TeacherAccount::where('id', $attendance->teacher_id)->first();

            $sheet->setCellValue('A' . $row, $attendance->date);
            $sheet->setCellValue('B' . $row, $subject->day);
            $sheet->setCellValue('C' . $row, $subject->subject);
            $sheet->setCellValue('D' . $row, $teacher->name);
            $sheet->setCellValue('E' . $row, $subject->time);
            $sheet->setCellValue('F' . $row, $attendance->time_in);
            $sheet->setCellValue('G' . $row, $attendance->status);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'attendance_history_' . StudentAccount::where('id', $id)->first()->name . '__' . uniqid() . '.xlsx';

        $response = new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $fileName . '"');
        $response->headers->set('Cache-Control', 'max-age=0');


        return $response;
    }
}