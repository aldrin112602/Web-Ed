<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Present as PresentModel;
use Illuminate\Support\{Carbon, Facades\Auth};


class Present extends Controller
{

    public function presentCount(Request $request) {
        $user = Auth::user();
        $today = Carbon::today();
        $presents = PresentModel::where('subject_id', $request->subject_id)
            ->where('teacher_id', $user->id)
            ->where('grade_handle_id', $request->grade_handle_id)
            ->whereDate('created_at', $today)->get();

        return response()->json([
            'count' => $presents->count()
        ]);
    }
}
