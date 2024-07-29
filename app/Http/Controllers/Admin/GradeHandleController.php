<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherGradeHandle;
use Illuminate\Support\Facades\Auth;

class GradeHandleController extends Controller
{
    public function viewUpdateGradeHandle($id) {
        $grade_handle = TeacherGradeHandle::where('id', $id)->get();
        
        
        // If grade handle does not exist, redirect with error
        if (!$grade_handle) {
            return redirect()->route('admin.view.grade_handle', $id)->with('error', 'Error: Data not found.');
        }
    
        // Get the authenticated user
        $user = Auth::user();
        
        // Return the view with the necessary data
        return view('admin.account_management.edit_grade_handle', [
            'grade_handle' => $grade_handle[0],
            'id' => $id,
            'user' => $user
        ]);
    }
}
