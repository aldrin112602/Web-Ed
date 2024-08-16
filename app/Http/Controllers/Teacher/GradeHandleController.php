<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\TeacherGradeHandle;
use Illuminate\{Http\Request, Support\Facades\Auth};


class GradeHandleController extends Controller
{
    public function viewUpdateGradeHandle($id)
    {
        $user = Auth::user();
        $grade_handle = TeacherGradeHandle::where('id', $id)->first();
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();
        return view('teacher.grade_handle.edit_grade_handle', [
            'grade_handle' => $grade_handle,
            'user' => $user,
            'id' => $id,
            'handleSubjects' => $handleSubjects
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




    public function submitAddHandleGrade(Request $request)
    {
        $validatedData = $request->validate(
            [
                'grade' => 'required|integer',
                'section' => 'required|string|max:255',
                'strand' => 'required|string|max:255'
            ]
        );


        $user = Auth::user();

        $teacherGradeHandle = new TeacherGradeHandle($validatedData);
        $teacherGradeHandle->teacher_id = $user->id;
        $teacherGradeHandle->save();

        return redirect()->route('teacher.dashboard')->with('success', "Grade handle added successfully");
    }



    public function viewAddHandleGrade()
    {
        $user = Auth::user();
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();
        return view(
            'teacher.grade_handle.add_grade_handle',
            ['user' => $user, 'handleSubjects' => $handleSubjects]
        );
    }
}
