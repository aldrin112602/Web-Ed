<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HighestPossibleScoreGradingSheet;
use App\Models\StudentGrade;
use Illuminate\Support\Facades\Auth;

class HighestPossibleScore extends Controller
{
    /**
     * Handle the submission of the highest possible scores and student scores.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'highest_possible_written_1' => 'integer|min:5|max:10|nullable',
            'highest_possible_written_2' => 'integer|min:5|max:10|nullable',
            'highest_possible_written_3' => 'integer|min:5|max:10|nullable',
            'highest_possible_written_4' => 'integer|min:5|max:10|nullable',
            'highest_possible_written_5' => 'integer|min:5|max:10|nullable',
            'highest_possible_written_6' => 'integer|min:5|max:10|nullable',
            'highest_possible_written_7' => 'integer|min:5|max:10|nullable',
            'highest_possible_written_8' => 'integer|min:5|max:10|nullable',
            'highest_possible_written_9' => 'integer|min:5|max:10|nullable',
            'highest_possible_written_10' => 'integer|min:5|max:10|nullable',

            'highest_possible_task_1' => 'integer|min:5|max:10|nullable',
            'highest_possible_task_2' => 'integer|min:5|max:10|nullable',
            'highest_possible_task_3' => 'integer|min:5|max:10|nullable',
            'highest_possible_task_4' => 'integer|min:5|max:10|nullable',
            'highest_possible_task_5' => 'integer|min:5|max:10|nullable',
            'highest_possible_task_6' => 'integer|min:5|max:10|nullable',
            'highest_possible_task_7' => 'integer|min:5|max:10|nullable',
            'highest_possible_task_8' => 'integer|min:5|max:10|nullable',
            'highest_possible_task_9' => 'integer|min:5|max:10|nullable',
            'highest_possible_task_10' => 'integer|min:5|max:10|nullable',

            'studentScores' => 'array', 
            'studentScores.*.student_id' => 'required|integer',
            'studentScores.*.written_scores' => 'array',
            'studentScores.*.task_scores' => 'array',
        ]);

        $existingGradingSheet = HighestPossibleScoreGradingSheet::where('teacher_id', Auth::id())->first();

        if ($existingGradingSheet) {
            $existingGradingSheet->update($validatedData);
        } else {
            HighestPossibleScoreGradingSheet::create([
                ...$validatedData,
                'teacher_id' => Auth::id(),
            ]);
        }

        $studentScores = $request->input('studentScores');

        foreach ($studentScores as $studentData) {
            $studentId = $studentData['student_id'];
            $grade = $studentData['grade'];
            $strand = $studentData['strand'];
            $section = $studentData['section'];
            $studentGrade = StudentGrade::firstOrNew(['student_id' => $studentId, 'teacher_id' => Auth::id(), 'grade' => $grade, 'strand' => $strand, 'section' => $section]);
            $writtenScores = [];
            foreach ($studentData['written_scores'] as $key => $score) {
                $writtenScores[$key] = $score;
            }

            $taskScores = [];
            foreach ($studentData['task_scores'] as $key => $score) {
                $taskScores[$key] = $score;
            }
            $studentGrade->fill(array_merge($writtenScores, $taskScores));
            $studentGrade->save();
        }

        return response()->json([
            'message' => 'Highest possible scores and student scores have been successfully saved.',
            'studentGrade' =>  $studentGrade,
            'request' => $request->all()
        ], 201);
    }
}
