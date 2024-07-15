<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SubjectModel;

class SubjectController extends Controller
{

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

            return view('admin.subject.subject_list', ['user' => $user, 'subject_list' => $subject_list]);
        }

        return redirect()->route('admin.login');
    }


    public function createSubject() {
        
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
            $subject->delete();

            return redirect()->route('admin.subject.subject_list')->with('success', 'Subject deleted successfully');
        }

        return redirect()->route('admin.login');
    }

    public function editSubject($id)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $subject = SubjectModel::findOrFail($id);

            return view('admin.subject.subject_list', ['user' => $user, 'subject' => $subject]);
        }

        return redirect()->route('admin.login');
    }


    public function updateSubject(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $user = SubjectModel::findOrFail($id);

            $request->validate([
                'subject' => 'required',
                'teacher' => 'required',
                'time' => 'required'
            ]);

            $user->update([
                'subject' => $request->subject,
                'teacher' => $request->teacher,
                'time' => $request->time,
            ]);

            $user->save();

            return redirect()->route('admin.subject.subject_list')->with('success', 'Subject updated successfully');
        }

        return redirect()->route('admin.login');
    }
    /////////////////// END /////////////////////


}

 
