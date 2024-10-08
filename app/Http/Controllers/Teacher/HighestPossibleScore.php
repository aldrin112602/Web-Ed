<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HighestPossibleScoreGradingSheet;
use Illuminate\Support\Facades\Auth;

class HighestPossibleScore extends Controller
{
    /**
     * Handle the submission of the highest possible scores.
     */
    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'highest_possible_written_1' => 'integer|min:5|max:10',
            'highest_possible_written_2' => 'integer|min:5|max:10',
            'highest_possible_written_3' => 'integer|min:5|max:10',
            'highest_possible_written_4' => 'integer|min:5|max:10',
            'highest_possible_written_5' => 'integer|min:5|max:10',
            'highest_possible_written_6' => 'integer|min:5|max:10',
            'highest_possible_written_7' => 'integer|min:5|max:10',
            'highest_possible_written_8' => 'integer|min:5|max:10',
            'highest_possible_written_9' => 'integer|min:5|max:10',
            'highest_possible_written_10' => 'integer|min:5|max:10',

            'highest_possible_task_1' => 'integer|min:5|max:10',
            'highest_possible_task_2' => 'integer|min:5|max:10',
            'highest_possible_task_3' => 'integer|min:5|max:10',
            'highest_possible_task_4' => 'integer|min:5|max:10',
            'highest_possible_task_5' => 'integer|min:5|max:10',
            'highest_possible_task_6' => 'integer|min:5|max:10',
            'highest_possible_task_7' => 'integer|min:5|max:10',
            'highest_possible_task_8' => 'integer|min:5|max:10',
            'highest_possible_task_9' => 'integer|min:5|max:10',
            'highest_possible_task_10' => 'integer|min:5|max:10',
        ]);

        // Check if the record exists for the current teacher
        $existingGradingSheet = HighestPossibleScoreGradingSheet::where('teacher_id', Auth::id())->first();

        if ($existingGradingSheet) {
            // Update the existing record if it exists
            $existingGradingSheet->update($validatedData);

            return response()->json([
                'message' => 'Highest possible scores have been successfully updated.',
                'data' => $existingGradingSheet
            ], 200);
        } else {
            // Create a new record if it doesn't exist
            $gradingSheet = HighestPossibleScoreGradingSheet::create([
                ...$validatedData,
                'teacher_id' => Auth::id(),
            ]);

            return response()->json([
                'message' => 'Highest possible scores have been successfully saved.',
                'data' => $gradingSheet
            ], 201);
        }
    }
}
