<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherGradeHandle;
use Illuminate\Support\Facades\Auth;

class GradeHandleController extends Controller
{
    public function viewUpdateGradeHandle($id)
    {
        $user = Auth::user();
        $grade_handle = TeacherGradeHandle::where('id', $id)->first();
        return view('teacher.grade_handle.edit_grade_handle', [
            'grade_handle' => $grade_handle,
            'user' => $user,
            'id' => $id
        ]);
    }

    public function updateGradeHandle(Request $request, $id)
    {
        $request->validate([
            'grade' => 'required|integer',
            'section' => 'required|string|max:255',
            'strand' => 'required|string|max:255'
        ]);

        $grade_handle = TeacherGradeHandle::where('id', $id)->first();

        if (!$grade_handle) {
            return redirect()->route('teacher.dashboard')->with('error', 'Error: Data not found.');
        }

        $grade_handle->grade = $request->grade;
        $grade_handle->section = $request->section;
        $grade_handle->strand = $request->strand;
        $grade_handle->save();

        return redirect()->route('teacher.dashboard')->with('success', "Grade handle updated successfully");
    }

    public function deleteGradeHandle(Request $request)
    {
        $grade_handle = TeacherGradeHandle::find($request->id);

        if (!$grade_handle) {
            return redirect()->route('teacher.dashboard')->with('error', 'Error: Data not found.');
        }

        $grade_handle->delete();

        return redirect()->route('teacher.dashboard')->with('success', 'Grade handle deleted successfully');
    }
}