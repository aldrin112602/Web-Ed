<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\StudentAccount;
use App\Models\Admin\AdminAccount;
use App\Models\Teacher\TeacherAccount;
use App\Models\Guidance\GuidanceAccount;
use App\Rules\TwoWords;
use Illuminate\Support\Facades\Storage;

class AccountManagementController extends Controller
{

    public function student_list(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();

            $query = StudentAccount::query();


            // Apply gender filter
            if ($request->has('gender') && $request->gender != ''  && $request->gender != 'All') {
                $query->where('gender', $request->gender);
            }

            // Apply strand filter
            if ($request->has('strand') && $request->strand != ''  && $request->strand != 'All') {
                $query->where('strand', $request->strand);
            }

            // Apply grade filter
            if ($request->has('grade') && $request->grade != ''  && $request->grade != 'All') {
                $query->where('grade', $request->grade);
            }

            $account_list = $query->paginate(10);

            return view('admin.account_management.student_list', ['user' => $user, 'account_list' => $account_list]);
        }

        return redirect()->route('admin.login');
    }

    public function admin_list(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $query = AdminAccount::query();


            // Apply gender filter
            if ($request->has('gender') && $request->gender != ''  && $request->gender != 'All') {
                $query->where('gender', $request->gender);
            }

           

            $account_list = $query->paginate(10);
            return view('admin.account_management.admin_list', ['user' => $user, 'account_list' => $account_list]);
        }

        return redirect()->route('admin.login');
    }

    public function teacher_list(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();

            $query = TeacherAccount::query();

            // Apply gender filter
            if ($request->has('gender') && $request->gender != '' && $request->gender != 'All') {
                $query->where('gender', $request->gender);
            }

            // Apply position filter
            if ($request->has('position') && $request->position != '' && $request->position != 'All') {
                $query->where('position', $request->position);
            }

            // Apply grade_handle filter
            if ($request->has('grade_handle') && $request->grade_handle != '' && $request->grade_handle != 'All') {
                $query->where('grade_handle', $request->grade_handle);
            }

            $account_list = $query->paginate(10);

            return view('admin.account_management.teacher_list', ['user' => $user, 'account_list' => $account_list]);
        }

        return redirect()->route('admin.login');
    }

    public function guidance_list(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $query = GuidanceAccount::query();


            // Apply gender filter
            if ($request->has('gender') && $request->gender != ''  && $request->gender != 'All') {
                $query->where('gender', $request->gender);
            }

           

            $account_list = $query->paginate(10);
            return view('admin.account_management.guidance_list', ['user' => $user, 'account_list' => $account_list]);
        }

        return redirect()->route('admin.login');
    }


    /***
     * 
     * //////////////////////////////////////////////////
     * ////// Student account (Update, delete, view) ////
     * //////////////////////////////////////////////////
     * 
     */
    public function deleteStudent($id)
    {
        if (Auth::guard('admin')->check()) {
            $student = StudentAccount::findOrFail($id);
            $student->delete();

            return redirect()->route('admin.student_list')->with('success', 'Student deleted successfully');
        }

        return redirect()->route('admin.login');
    }

    public function editStudent($id)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $student = StudentAccount::findOrFail($id);

            return view('admin.account_management.edit_student', ['user' => $user, 'student' => $student]);
        }

        return redirect()->route('admin.login');
    }


    public function updateStudent(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $user = StudentAccount::findOrFail($id);

            $request->validate([
                'name' => ['required', 'string', 'max:255', new TwoWords],
                'new_password' => 'nullable|string|min:6|max:255',
                'parents_contact_number' => 'required|string|min:11|max:11',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'phone_number' => 'required|string|min:11|max:11',
                'address' => 'nullable|string|max:255',
                'email' => 'required|email|max:255|unique:student_accounts,email,' . $user->id,
                'id_number' => 'required|min:5|max:255|unique:student_accounts,id_number,' . $user->id,
            ]);

            $user->update([
                'name' => $request->name,
                'id_number' => $request->id_number,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'gender' => $request->gender,
                'strand' => $request->strand,
                'grade' => $request->grade,
                'parents_contact_number' => $request->parents_contact_number,
            ]);

            if ($request->filled('new_password')) {
                $user->password = $request->new_password;
            }

            if ($request->hasFile('profile')) {
                if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                    Storage::disk('public')->delete($user->profile);
                }

                $profilePhotoPath = $request->file('profile_photo')->store('profiles', 'public');
                $user->profile = $profilePhotoPath;
                $user->profile = $profilePhotoPath;
            }

            $user->save();

            return redirect()->route('admin.student_list')->with('success', 'Student updated successfully');
        }

        return redirect()->route('admin.login');
    }
    /////////////////// END /////////////////////





    /***
     * 
     * //////////////////////////////////////////////////
     * ////// Teacher account (Update, delete, view) ////
     * //////////////////////////////////////////////////
     * 
     */
    public function deleteTeacher($id)
    {
        if (Auth::guard('admin')->check()) {
            $teacher = TeacherAccount::findOrFail($id);
            $teacher->delete();

            return redirect()->route('admin.teacher_list')->with('success', 'Teacher deleted successfully');
        }

        return redirect()->route('admin.login');
    }

    public function editTeacher($id)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $teacher = TeacherAccount::findOrFail($id);

            return view('admin.account_management.edit_teacher', ['user' => $user, 'teacher' => $teacher]);
        }

        return redirect()->route('admin.login');
    }


    public function updateTeacher(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $user = TeacherAccount::findOrFail($id);

            // Consolidate validation rules
            $request->validate([
                'id_number' => 'required|min:5|max:255|unique:teacher_accounts,id_number,' . $user->id,
                'name' => ['required', 'string', 'max:255', new TwoWords],
                'new_password' => 'nullable|string|min:6|max:255',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'phone_number' => 'required|string|min:11|max:11',
                'address' => 'nullable|string|max:255',
                'grade_handle' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:teacher_accounts,email,' . $user->id,
                'position' => 'required',
            ]);

            // Update user attributes
            $user->update([
                'id_number' => $request->id_number,
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'gender' => $request->gender,
                'grade_handle' => $request->grade_handle,
                'position' => $request->position,
            ]);

            // Handle new password if provided
            if ($request->filled('new_password')) {
                $user->password = $request->new_password;
            }

            // Handle profile photo upload if provided
            if ($request->hasFile('profile')) {
                if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                    Storage::disk('public')->delete($user->profile);
                }

                $profilePhotoPath = $request->file('profile')->store('profiles', 'public');
                $user->profile = $profilePhotoPath;
            }

            $user->save();

            return redirect()->route('admin.teacher_list')->with('success', 'Teacher updated successfully');
        }

        return redirect()->route('admin.login');
    }

    /////////////////// END /////////////////////




    /***
     * 
     * //////////////////////////////////////////////////
     * ////// Guidance account (Update, delete, view) ////
     * //////////////////////////////////////////////////
     * 
     */
    public function deleteGuidance($id)
    {
        if (Auth::guard('admin')->check()) {
            $guidance = GuidanceAccount::findOrFail($id);
            $guidance->delete();

            return redirect()->route('admin.guidance_list')->with('success', 'Guidance deleted successfully');
        }

        return redirect()->route('admin.login');
    }

    public function editGuidance($id)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $guidance = GuidanceAccount::findOrFail($id);

            return view('admin.account_management.edit_guidance', ['user' => $user, 'guidance' => $guidance]);
        }

        return redirect()->route('admin.login');
    }


    public function updateGuidance(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $user = GuidanceAccount::findOrFail($id);

            // Consolidate validation rules
            $request->validate([
                'id_number' => 'required|min:5|max:255|unique:guidance_accounts,id_number,' . $user->id,
                'name' => ['required', 'string', 'max:255', new TwoWords],
                'new_password' => 'nullable|string|min:6|max:255',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'phone_number' => 'required|string|min:11|max:11',
                'address' => 'nullable|string|max:255',
                'email' => 'required|email|max:255|unique:guidance_accounts,email,' . $user->id,
            ]);

            // Update user attributes
            $user->update([
                'id_number' => $request->id_number,
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'gender' => $request->gender,
            ]);

            // Handle new password if provided
            if ($request->filled('new_password')) {
                $user->password = $request->new_password;
            }

            // Handle profile photo upload if provided
            if ($request->hasFile('profile')) {
                if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                    Storage::disk('public')->delete($user->profile);
                }

                $profilePhotoPath = $request->file('profile')->store('profiles', 'public');
                $user->profile = $profilePhotoPath;
            }

            $user->save();

            return redirect()->route('admin.guidance_list')->with('success', 'Guidance updated successfully');
        }

        return redirect()->route('admin.login');
    }
    /////////////////// END /////////////////////






    
    /***
     * 
     * //////////////////////////////////////////////////
     * ////// Admin account (Update, delete, view) ////
     * //////////////////////////////////////////////////
     * 
     */
    public function deleteAdmin($id)
    {
        if (Auth::guard('admin')->check()) {
            $admin = AdminAccount::findOrFail($id);
            $admin->delete();

            return redirect()->route('admin.admin_list')->with('success', 'Admin deleted successfully');
        }

        return redirect()->route('admin.login');
    }

    public function editAdmin($id)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $admin = AdminAccount::findOrFail($id);

            return view('admin.account_management.edit_admin', ['user' => $user, 'admin' => $admin]);
        }

        return redirect()->route('admin.login');
    }


    public function updateAdmin(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $user = AdminAccount::findOrFail($id);

            // Consolidate validation rules
            $request->validate([
                'id_number' => 'required|min:5|max:255|unique:admin_accounts,id_number,' . $user->id,
                'name' => ['required', 'string', 'max:255', new TwoWords],
                'new_password' => 'nullable|string|min:6|max:255',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'phone_number' => 'required|string|min:11|max:11',
                'address' => 'nullable|string|max:255',
                'email' => 'required|email|max:255|unique:admin_accounts,email,' . $user->id,
            ]);

            // Update user attributes
            $user->update([
                'id_number' => $request->id_number,
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'gender' => $request->gender,
            ]);

            // Handle new password if provided
            if ($request->filled('new_password')) {
                $user->password = $request->new_password;
            }

            // Handle profile photo upload if provided
            if ($request->hasFile('profile')) {
                if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                    Storage::disk('public')->delete($user->profile);
                }

                $profilePhotoPath = $request->file('profile')->store('profiles', 'public');
                $user->profile = $profilePhotoPath;
            }

            $user->save();

            return redirect()->route('admin.admin_list')->with('success', 'Admin updated successfully');
        }

        return redirect()->route('admin.login');
    }
    /////////////////// END /////////////////////
}

 
