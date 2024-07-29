<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherGradeHandle;
use Illuminate\Support\Facades\Auth;

class GradeHandleController extends Controller
{
    public function viewUpdateGradeHandle($id) {
        // Find the grade handle by ID
        $grade_handle = TeacherGradeHandle::where('id', $id);
        // dd($grade_handle);
        // If grade handle does not exist, redirect with error
        if (!$grade_handle) {
            return redirect()->route('admin.view.grade_handle', $id)->with('error', 'Error: Data not found.');
        }
    
        // Get the authenticated user
        $user = Auth::user();
        
        // Return the view with the necessary data
        return view('admin.account_management.edit_grade_handle', [
            'grade_handle' => $grade_handle,
            'id' => $id,
            'user' => $user
        ]);
    }
}
