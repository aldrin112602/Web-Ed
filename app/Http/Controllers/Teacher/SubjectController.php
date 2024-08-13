<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\SubjectModel;
use App\Models\History;
use App\Models\TeacherGradeHandle;
use App\Models\Student\StudentAccount;

class SubjectController extends Controller
{
    public function index()
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
            $allSubjects = SubjectModel::where('teacher_id', $user->id)->get();
            // $allStudentsCount = $this->countStudents();
            $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();
            return view('teacher.subject.index', ['user' => $user, 'allSubjects' => $allSubjects, "allStudentsCount" => 0, "handleSubjects" => $handleSubjects]);
        }

        return redirect()->route('teacher.login');
    }




    public function viewStudentSubjects($id)
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
            $student = StudentAccount::with('subjects.teacherAccount')->findOrFail($id);
            $subjects = SubjectModel::with('teacherAccount')->paginate(10);
            $handleSubjects = TeacherGradeHandle::where('teacher_id', $id)->get();

            return view('teacher.students.subject.view', [
                'user' => $user,
                'student' => $student,
                'subjects' => $subjects,
                'handleSubjects' => $handleSubjects
            ]);
        }

        return redirect()->route('teacher.login');
    }

    public function subjectList()
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
            $id = request()->query('id');

            if (!$id || !TeacherGradeHandle::find($id)) {
                return redirect()->route('teacher.dashboard')->with('error', 'Invalid grade handle ID');
            }

            $subject_list = SubjectModel::where('teacher_id', $user->id)->where('grade_handle_id', $id)->paginate(10);

            $grade_handle = TeacherGradeHandle::find($id);
            $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();

            return view('teacher.subject.subject_list', [
                'user' => $user,
                'subject_list' => $subject_list,
                'id' => $id,
                'grade_handle' => $grade_handle,
                'handleSubjects' => $handleSubjects
            ]);
        }

        return redirect()->route('teacher.login');
    }




    public function countStudents()
    {
        $user = Auth::guard('teacher')->user();
        $subject = SubjectModel::where('teacher_id', $user->id)->first();
        $students = $subject->students()->count();
        return $students;
    }


    public function viewCreateSubject()
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
            $id = request()->query('id');

            if (!$id || !TeacherGradeHandle::find($id)) {
                return redirect()->route('teacher.dashboard')->with('error', 'Invalid grade handle ID');
            }

            $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();

            return view('teacher.subject.create', ['user' => $user, 'id' => $id, 'handleSubjects' => $handleSubjects]);
        }

        return redirect()->route('teacher.login');
    }



    public function createSubject(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'day' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
        ]);


        $auth_user = Auth::user();

        $time_start_12hr = $this->convertTo12HourFormat($request->time_start);
        $time_end_12hr = $this->convertTo12HourFormat($request->time_end);


        $subject = new SubjectModel([
            'subject' => $request->subject,
            'day' => $request->day,
            'teacher_id' => $auth_user->id,
            'grade_handle_id' => $request->_id,
            'time' => $time_start_12hr . ' - ' . $time_end_12hr
        ]);
        $subject->save();


        History::create(
            [
                'user_id' => $auth_user->id,
                'position' => $auth_user->role,
                'history' => "Created a subject",
                'description' => "Subject created: " . $subject->name
            ]
        );


        return redirect()->route('teacher.subject_list', ['id' => $request->_id])->with('success', 'Subject created successfully');
    }

    // Helper function
    public function convertTo12HourFormat($time)
    {
        $hours = intval(explode(':', $time)[0]);
        $minutes = explode(':', $time)[1];
        $period = $hours >= 12 ? 'PM' : 'AM';

        $hours = $hours % 12;
        $hours = $hours ? $hours : 12;

        return sprintf('%02d:%02d %s', $hours, $minutes, $period);
    }



    public function deleteSubject(Request $request, $id)
    {
        if (Auth::guard('teacher')->check()) {
            $subject = SubjectModel::findOrFail($id);

            $auth_user = Auth::user();
            History::create(
                [
                    'user_id' => $auth_user->id,
                    'position' => $auth_user->role,
                    'history' => "Deleted a subject $subject->name",
                    'description' => "Subject deleted: " . $subject->name
                ]
            );


            $subject->delete();

            return redirect()->route('teacher.subject_list', ['id' => $request->id])->with('success', 'Subject deleted successfully');
        }



        return redirect()->route('teacher.login');
    }



    public function deleteSelectedSubjects(Request $request)
    {
        $ids = $request->input('selected_ids');
        $idsArray = explode(',', $ids);

        SubjectModel::whereIn('id', $idsArray)->delete();
        $auth_user = Auth::user();
        History::create(
            [
                'user_id' => $auth_user->id,
                'position' => $auth_user->role,
                'history' => "Deleted all selected subjects",
                'description' => "Deleted ids: $ids"
            ]
        );

        return redirect()->route('teacher.subject_list', ['id' => $request->id])->with('success', 'Selected row' . (count($idsArray) == 1 ? '' : 's') . ' have been deleted!');
    }



    public function viewEditSubject($id)
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
            $subject = SubjectModel::findOrFail($id);

            return view('teacher.subject.edit', ['user' => $user, 'subject' => $subject]);
        }

        return redirect()->route('teacher.login');
    }


    public function updateSubject(Request $request, $id)
    {
        if (Auth::guard('teacher')->check()) {
            $subject = SubjectModel::findOrFail($id);

            $request->validate([
                'subject' => 'required',
                'time' => 'required',
                'day' => 'required'
            ]);

            $subject->update([
                'subject' => $request->subject,
                'time' => $request->time,
                'day' => $request->day,
            ]);

            $subject->save();


            $auth_user = Auth::user();
            History::create(
                [
                    'user_id' => $auth_user->id,
                    'position' => $auth_user->role,
                    'history' => "Updated a subject $subject->name",
                    'description' => "Subject updated: " . $subject->name
                ]
            );

            return redirect()->route('teacher.subject_list')->with('success', 'Subject updated successfully');
        }

        return redirect()->route('teacher.login');
    }
}
