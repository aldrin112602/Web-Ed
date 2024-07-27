<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\StudentAccount as Student;
use App\Models\Admin\AdminAccount as Admin;
use App\Models\Teacher\TeacherAccount as Teacher;
use App\Models\Guidance\GuidanceAccount as Guidance;
use App\Models\Admin\SubjectModel as Subject;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class deleteSelected extends Controller
{
    public function deleteSelectedStudents(Request $request)
    {
        $ids = $request->input('selected_ids');
        $idsArray = explode(',', $ids);

        Student::whereIn('id', $idsArray)->delete();
        $auth_user = Auth::user();
        History::create(
            [
                'user_id' => $auth_user->id,
                'position' => $auth_user->role,
                'history' => "Deleted all selected students account",
                'description' => "Deleted ids: $ids"
            ]
        );

        return redirect()->route('admin.student_list')->with('success', 'Selected row' . (count($idsArray) == 1 ? '' : 's') . ' have been deleted!');
    }

    public function deleteSelectedAdmins(Request $request)
    {
        $ids = $request->input('selected_ids');
        $idsArray = explode(',', $ids);

        Admin::whereIn('id', $idsArray)->delete();

        $auth_user = Auth::user();
        History::create(
            [
                'user_id' => $auth_user->id,
                'position' => $auth_user->role,
                'history' => "Deleted all selected admins account",
                'description' => "Deleted ids: $ids"
            ]
        );

        return redirect()->route('admin.admin_list')->with('success', 'Selected row' . (count($idsArray) == 1 ? '' : 's') . ' have been deleted!');
    }

    public function deleteSelectedTeachers(Request $request)
    {
        $ids = $request->input('selected_ids');
        $idsArray = explode(',', $ids);

        Teacher::whereIn('id', $idsArray)->delete();

        $auth_user = Auth::user();
        History::create(
            [
                'user_id' => $auth_user->id,
                'position' => $auth_user->role,
                'history' => "Deleted all selected teachers account",
                'description' => "Deleted ids: $ids"
            ]
        );

        return redirect()->route('admin.teacher_list')->with('success', 'Selected row' . (count($idsArray) == 1 ? '' : 's') . ' have been deleted!');
    }

    public function deleteSelectedGuidances(Request $request)
    {
        $ids = $request->input('selected_ids');
        $idsArray = explode(',', $ids);

        Guidance::whereIn('id', $idsArray)->delete();

        $auth_user = Auth::user();
        History::create(
            [
                'user_id' => $auth_user->id,
                'position' => $auth_user->role,
                'history' => "Deleted all selected guidances account",
                'description' => "Deleted ids: $ids"
            ]
        );

        return redirect()->route('admin.guidance_list')->with('success', 'Selected row' . (count($idsArray) == 1 ? '' : 's') . ' have been deleted!');
    }


    public function deleteSelectedSubjects(Request $request)
    {
        $ids = $request->input('selected_ids');
        $idsArray = explode(',', $ids);

        Subject::whereIn('id', $idsArray)->delete();
        $auth_user = Auth::user();
        History::create(
            [
                'user_id' => $auth_user->id,
                'position' => $auth_user->role,
                'history' => "Deleted all selected subjects",
                'description' => "Deleted ids: $ids"
            ]
        );

        return redirect()->route('admin.subject_list')->with('success', 'Selected row' . (count($idsArray) == 1 ? '' : 's') . ' have been deleted!');
    }
}
