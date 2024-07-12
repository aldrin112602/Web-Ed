<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentAccount;
use App\Models\AdminAccount;
use App\Models\TeacherAccount;
use App\Models\GuidanceAccount;
use App\Rules\TwoWords;
use Illuminate\Support\Facades\Storage;

class AccountManagementController extends Controller
{

    public function student_list(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();

            $query = StudentAccount::query();

            // Apply search filter
            if ($request->search != '') {
                $query->where(function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('id_number', 'like', '%' . $request->search . '%')
                        ->orWhere('username', 'like', '%' . $request->search . '%');
                });
            }

            // Apply gender filter
            if ($request->has('gender') && $request->gender != '') {
                $query->where('gender', $request->gender);
            }

            // Apply strand filter
            if ($request->has('strand') && $request->strand != '') {
                $query->where('strand', $request->strand);
            }

            $account_list = $query->paginate(10);

            return view('admin.account_management.student_list', ['user' => $user, 'account_list' => $account_list]);
        }

        return redirect()->route('admin.login');
    }

    public function admin_list()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $account_list = AdminAccount::paginate(10);
            return view('admin.account_management.admin_list', ['user' => $user, 'account_list' => $account_list]);
        }

        return redirect()->route('admin.login');
    }

    public function teacher_list()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $account_list = TeacherAccount::paginate(10);
            return view('admin.account_management.teacher_list', ['user' => $user, 'account_list' => $account_list]);
        }

        return redirect()->route('admin.login');
    }

    public function guidance_list()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $account_list = GuidanceAccount::paginate(10);
            return view('admin.account_management.guidance_list', ['user' => $user, 'account_list' => $account_list]);
        }

        return redirect()->route('admin.login');
    }



    public function deleteStudent($id) {
        if (Auth::guard('admin')->check()) {
            $student = StudentAccount::findOrFail($id);
            $student->delete();

            return redirect()->route('admin.student_list')->with('success', 'Student deleted successfully');
        }

        return redirect()->route('admin.login');
    }

    public function editStudent($id) {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $student = StudentAccount::findOrFail($id);

            return view('admin.account_management.edit_student', ['user' => $user, 'student' => $student]);
        }

        return redirect()->route('admin.login');
    }


    public function updateStudent(Request $request, $id) {
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
    
}

