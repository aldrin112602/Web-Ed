<?php

namespace App\Http\Controllers;

use App\Services\PHPMailerService;
use App\Models\Student\StudentAccount;
use Illuminate\Support\Facades\DB;

class SendMailAttendance extends Controller
{
    protected $mailerService;

    public function __construct(PHPMailerService $mailerService)
    {
        $this->mailerService = $mailerService;
    }

    public function sendAttendance()
    {
        // Determine the current quarter dynamically
        $currentMonth = date('n');
        $quarter = match (true) {
            $currentMonth >= 1 && $currentMonth <= 3 => '1st Quarter',
            $currentMonth >= 4 && $currentMonth <= 6 => '2nd Quarter',
            $currentMonth >= 7 && $currentMonth <= 9 => '3rd Quarter',
            $currentMonth >= 10 && $currentMonth <= 12 => '4th Quarter',
            default => 'Unknown Quarter',
        };

        // Initialize sent and not sent lists
        $sent = [];
        $notSent = [];

        // Fetch all student accounts with their attendance histories
        $students = StudentAccount::with('attendanceHistories')->get();

        foreach ($students as $student) {
            $absences = [];
            $highlightedAbsences = [];
            $patternsOfTardiness = [];

            // Process attendance histories for the student
            foreach ($student->attendanceHistories as $record) {
                if (strtolower($record->status) === 'absent') {
                    $absences[] = [
                        'date' => $record->date,
                        'reason' => $record->remarks ?? 'Unexcused'
                    ];

                    if ($record->remarks === null || strtolower($record->remarks) === 'unexcused') {
                        $highlightedAbsences[] = $record->date;
                    }
                } elseif (strtolower($record->status) === 'late') {
                    $patternsOfTardiness[] = $record->date;
                }
            }

            // Prepare email data
            $data = [
                'grade' => $student->grade,
                'strand' => $student->strand,
                'section' => $student->section,
                'quarter' => $quarter,
                'absences' => $absences,
                'highlighted_absences' => $highlightedAbsences,
                'patterns_of_tardiness' => $patternsOfTardiness,
                'student_name' => $student->name
            ];

            // Send the attendance report email
            try {
                if ($this->mailerService->sendAttendance($student->parents_email, $data)) {
                    $sent[] = $student->parents_email;
                } else {
                    $notSent[] = [
                        'email' => $student->parents_email,
                        'reason' => 'Failed to send email'
                    ];
                }
            } catch (\Exception $e) {
                $notSent[] = [
                    'email' => $student->parents_email,
                    'reason' => $e->getMessage()
                ];
            }
        }

        // Return the response
        return response()->json([
            'sent' => $sent,
            'not_sent' => $notSent,
            'success' => true,
            'message' => "Quarterly Attendance Report Sent Successfully"
        ], 200);
    }
}
