<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\SubjectModel;
use App\Models\Teacher\TeacherAccount;
use App\Models\Student\StudentAccount;
use App\Models\History;

class SubjectController extends Controller
{

    public function subject()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();

            return view('admin.subject.subject', ['user' => $user]);
        }

        return redirect()->route('admin.login');
    }


    public function viewStudentSubjects($id)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $student = StudentAccount::with('subjects.teacherAccount')->findOrFail($id);
            $subjects = SubjectModel::with('teacherAccount')->paginate(10); // Paginate the subjects query

            return view('admin.subject.view', [
                'user' => $user,
                'student' => $student,
                'subjects' => $subjects
            ]);
        }

        return redirect()->route('admin.login');
    }



    public function deleteStudentSubject($student_id, $subject_id)
    {
        if (Auth::guard('admin')->check()) {
            $student = StudentAccount::findOrFail($student_id);

            // Retrieve the subject details
            $subject = SubjectModel::findOrFail($subject_id);

            $auth_user = Auth::user();
            History::create(
                [
                    'user_id' => $auth_user->id,
                    'position' => $auth_user->role,
                    'history' => "Deleted a subject $subject->name from $student->name's account",
                    'description' => "Subject deleted: " . $subject->name
                ]
            );

            $student->subjects()->detach($subject_id);

            return redirect()->route('admin.view.subjects', $student_id)->with('success', 'Subject deleted successfully');
        }

        return redirect()->route('admin.login');
    }





    public function addSubject(Request $request)
    {
        $request->validate([
            'subject' => 'required|exists:subject_models,id',
            'student_id' => 'required|exists:student_accounts,id',
        ]);

        $student = StudentAccount::find($request->student_id);
        $subject = SubjectModel::find($request->subject);

        if ($student && $subject) {
            $student->subjects()->attach($subject->id);
            $auth_user = Auth::user();
            History::create(
                [
                    'user_id' => $auth_user->id,
                    'position' => $auth_user->role,
                    'history' => "Added a subject $subject->name to $student->name's account",
                    'description' => null
                ]
            );
            return redirect()->back()->with('success', 'Subject added successfully!');
        }

        return redirect()->back()->with('error', 'Error adding subject.');
    }


    public function subject_list(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();

            $query = SubjectModel::query();


            // Apply subject filter
            if ($request->has('subject') && $request->subject != ''  && $request->subject != 'All') {
                $query->where('subject', $request->subject);
            }


            $subject_list = $query->paginate(10);

            $teachersAccount = TeacherAccount::all();
            return view('admin.subject.subject_list', ['user' => $user, 'subject_list' => $subject_list, 'teachersAccount' => $teachersAccount]);
        }

        return redirect()->route('admin.login');
    }


    public function createSubject(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'day' => 'required',
            'assign_teacher' => 'required|exists:teacher_accounts,id',
            'time_start' => 'required',
            'time_end' => 'required',
        ]);

        $time_start_12hr = $this->convertTo12HourFormat($request->time_start);
        $time_end_12hr = $this->convertTo12HourFormat($request->time_end);

        $subject = new SubjectModel([
            'subject' => $request->subject,
            'day' => $request->day,
            'teacher_id' => $request->assign_teacher,
            'time' => $time_start_12hr . ' - ' . $time_end_12hr
        ]);
        $subject->save();

        $auth_user = Auth::user();
            History::create(
                [
                    'user_id' => $auth_user->id,
                    'position' => $auth_user->role,
                    'history' => "Created a subject",
                    'description' => "Subject created: " . $subject->name
                ]
            );

        
        return redirect()->route('admin.subject_list')->with('success', 'Subject created successfully');
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


    public function viewCreateSubject()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $teachersAccount = TeacherAccount::all();
            return view('admin.subject.create', ['user' => $user, 'teachersAccount' => $teachersAccount]);
        }

        return redirect()->route('admin.login');
    }

    /***
     * 
     * //////////////////////////////////////////////////
     * ////// Subject account (Update, delete, view) ////
     * //////////////////////////////////////////////////
     * 
     */
    public function deleteSubject($id)
    {
        if (Auth::guard('admin')->check()) {
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

            return redirect()->route('admin.subject_list')->with('success', 'Subject deleted successfully');
        }



        return redirect()->route('admin.login');
    }

    public function viewEditSubject($id)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $subject = SubjectModel::findOrFail($id);

            return view('admin.subject.edit', ['user' => $user, 'subject' => $subject]);
        }

        return redirect()->route('admin.login');
    }


    public function updateSubject(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $subject = SubjectModel::findOrFail($id);

            $request->validate([
                'subject' => 'required',
                'teacher' => 'required',
                'time' => 'required'
            ]);

            $subject->update([
                'subject' => $request->subject,
                'teacher' => $request->teacher,
                'time' => $request->time,
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

            return redirect()->route('admin.subject_list')->with('success', 'Subject updated successfully');
        }

        return redirect()->route('admin.login');
    }
    /////////////////// END /////////////////////


}
