<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\StudentAccount;
use App\Models\AdminAccount;
use App\Models\TeacherAccount;
use App\Models\GuidanceAccount;

class ExcelController extends Controller
{
    public function exportAdminList()
    {
        $admins = AdminAccount::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header
        $sheet->setCellValue('A1', 'ID Number');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Gender');
        $sheet->setCellValue('D1', 'Username');
        $sheet->setCellValue('E1', 'Email');
        $sheet->setCellValue('F1', 'Position');
        $sheet->setCellValue('G1', 'Role');
        $sheet->setCellValue('H1', 'Address');
        $sheet->setCellValue('I1', 'Phone Number');

        // Populate data
        $row = 2;
        foreach ($admins as $admin) {
            $sheet->setCellValue('A' . $row, $admin->id_number);
            $sheet->setCellValue('B' . $row, $admin->name);
            $sheet->setCellValue('C' . $row, $admin->gender);
            $sheet->setCellValue('D' . $row, $admin->username);
            $sheet->setCellValue('E' . $row, $admin->email);
            $sheet->setCellValue('F' . $row, $admin->position);
            $sheet->setCellValue('G' . $row, $admin->role);
            $sheet->setCellValue('H' . $row, $admin->address);
            $sheet->setCellValue('I' . $row, $admin->phone_number);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'admin_list_' . uniqid() . '.xlsx';

        $response = new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $fileName . '"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }

    public function exportStudentList()
    {
        $students = StudentAccount::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header
        $sheet->setCellValue('A1', 'ID Number');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Gender');
        $sheet->setCellValue('D1', 'Strand');
        $sheet->setCellValue('E1', 'Grade');
        $sheet->setCellValue('F1', 'Parent\'s Contact Number');
        $sheet->setCellValue('G1', 'Username');
        $sheet->setCellValue('H1', 'Email');
        $sheet->setCellValue('I1', 'Role');
        $sheet->setCellValue('J1', 'Phone Number');
        $sheet->setCellValue('K1', 'Address');
        $sheet->setCellValue('L1', 'Section');

        // Populate data
        $row = 2;
        foreach ($students as $student) {
            $sheet->setCellValue('A' . $row, $student->id_number);
            $sheet->setCellValue('B' . $row, $student->name);
            $sheet->setCellValue('C' . $row, $student->gender);
            $sheet->setCellValue('D' . $row, $student->strand);
            $sheet->setCellValue('E' . $row, $student->grade);
            $sheet->setCellValue('F' . $row, $student->parents_contact_number);
            $sheet->setCellValue('G' . $row, $student->username);
            $sheet->setCellValue('H' . $row, $student->email);
            $sheet->setCellValue('I' . $row, $student->role);
            $sheet->setCellValue('J' . $row, $student->phone_number);
            $sheet->setCellValue('K' . $row, $student->address);
            $sheet->setCellValue('L' . $row, $student->section);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'student_list_' . uniqid() . '.xlsx';

        $response = new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $fileName . '"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }

    public function exportGuidanceList()
    {
        $guidances = GuidanceAccount::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header
        $sheet->setCellValue('A1', 'ID Number');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Gender');
        $sheet->setCellValue('D1', 'Username');
        $sheet->setCellValue('E1', 'Email');
        $sheet->setCellValue('F1', 'Position');
        $sheet->setCellValue('G1', 'Role');
        $sheet->setCellValue('H1', 'Phone Number');
        $sheet->setCellValue('I1', 'Address');

        // Populate data
        $row = 2;
        foreach ($guidances as $guidance) {
            $sheet->setCellValue('A' . $row, $guidance->id_number);
            $sheet->setCellValue('B' . $row, $guidance->name);
            $sheet->setCellValue('C' . $row, $guidance->gender);
            $sheet->setCellValue('D' . $row, $guidance->username);
            $sheet->setCellValue('E' . $row, $guidance->email);
            $sheet->setCellValue('F' . $row, $guidance->position);
            $sheet->setCellValue('G' . $row, $guidance->role);
            $sheet->setCellValue('H' . $row, $guidance->phone_number);
            $sheet->setCellValue('I' . $row, $guidance->address);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'guidance_list_' . uniqid() . '.xlsx';

        $response = new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $fileName . '"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }

    public function exportTeacherList()
    {
        $teachers = TeacherAccount::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header
        $sheet->setCellValue('A1', 'ID Number');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Gender');
        $sheet->setCellValue('D1', 'Role');
        $sheet->setCellValue('E1', 'Position');
        $sheet->setCellValue('F1', 'Grade Handle');
        $sheet->setCellValue('G1', 'Username');
        $sheet->setCellValue('H1', 'Email');
        $sheet->setCellValue('I1', 'Phone Number');
        $sheet->setCellValue('J1', 'Address');

        // Populate data
        $row = 2;
        foreach ($teachers as $teacher) {
            $sheet->setCellValue('A' . $row, $teacher->id_number);
            $sheet->setCellValue('B' . $row, $teacher->name);
            $sheet->setCellValue('C' . $row, $teacher->gender);
            $sheet->setCellValue('D' . $row, $teacher->role);
            $sheet->setCellValue('E' . $row, $teacher->position);
            $sheet->setCellValue('F' . $row, $teacher->grade_handle);
            $sheet->setCellValue('G' . $row, $teacher->username);
            $sheet->setCellValue('H' . $row, $teacher->email);
            $sheet->setCellValue('I' . $row, $teacher->phone_number);
            $sheet->setCellValue('J' . $row, $teacher->address);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'teacher_list_' . uniqid() . '.xlsx';

        $response = new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', 'attachment;filename="' . $fileName . '"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }
}
