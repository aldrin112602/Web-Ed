<?php

namespace App\Http\Controllers\Guidance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\TwoWords;
use Illuminate\Support\Facades\{Hash, Auth, Storage, Session};
use App\Models\Student\StudentAccount;
use App\Models\Student\AttendanceHistory;
use App\Models\TeacherGradeHandle;
use App\Models\Admin\SubjectModel;
use App\Models\Teacher\TeacherAccount;




class GuidanceController extends Controller
{


    public function attendanceReport()
    {
        $user = Auth::guard('guidance')->user();
        return view('guidance.attendance_report', ['user' => $user]);
    }


    public function attendanceHistory()
    {
        $user = Auth::guard('guidance')->user();
        $attendace_histories = AttendanceHistory::all();
        return view('guidance.attendance_history', [
            'user' => $user,
            'attendace_histories' => $attendace_histories,
            'TeacherGradeHandle' => TeacherGradeHandle::class,
            'SubjectModel' => SubjectModel::class,
            'TeacherAccount' => TeacherAccount::class,
            'account_list' => StudentAccount::paginate(10) 
        ]);
    }

    public function login()
    {
        if (Auth::guard('guidance')->check()) {
            return redirect()->intended('guidance/dashboard');
        }
        // Clear session
        Session::forget('otp_email');
        Session::forget('otp');

        return view('guidance.auth.login');
    }


    public function logout()
    {
        if (Auth::guard('guidance')->check()) {
            Auth::guard('guidance')->logout();
            return redirect()
                ->route('guidance.login')
                ->with('success', 'Logout successfully!');
        }
    }

    public function handleLogin(Request $request)
    {
        // Validate the input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('guidance')->attempt($credentials, $request->filled('remember'))) {
            // Authentication passed

            return redirect()->intended('guidance/dashboard');
        }

        // Authentication failed
        return redirect()->back()->withErrors([
            'password' => 'Invalid username or password.',
        ])->withInput($request->except('password'));
    }

    public function dashboard()
    {
        if (Auth::guard('guidance')->check()) {
            $user = Auth::guard('guidance')->user();
            $total_number_of_students = StudentAccount::all()->count();
            return view('guidance.dashboard', [
                'user' => $user,
                'total_number_of_students' => $total_number_of_students
            ]);
        }

        return redirect()->route('guidance.login');
    }




    public function profile()
    {
        if (Auth::guard('guidance')->check()) {
            $user = Auth::guard('guidance')->user();
            return view('guidance.profile.profile', ['user' => $user]);
        }

        return redirect()->route('guidance.login');
    }



    public function updateAccount(Request $request)
    {
        if (Auth::guard('guidance')->check()) {
            $user = Auth::guard('guidance')->user();

            // Validate the input
            $request->validate([
                'id_number' => 'required|min:5|max:255|unique:admin_accounts,id_number,' . $user->id,
                'name' => ['required', 'string', 'max:255', new TwoWords],
                'email' => 'required|email|max:255|unique:admin_accounts,email,' . $user->id,
                'gender' => 'required|string|in:Male,Female',
                'address' => 'required|string|max:255',
                'extension_name' => 'required|string|max:255',
                'phone_number' => 'required|string|min:11|max:11',
            ]);


            $user->update([
                'name' => $request->name,
                'id_number' => $request->id_number,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'extension_name' => $request->extension_name,
                'gender' => $request->gender,
            ]);

            // Re-authenticate the user with the new password
            Auth::guard('guidance')->login($user);

            return redirect()
                ->back()
                ->with('success', 'Profile updated successfully!');
        }

        return redirect()->route('guidance.login');
    }



    public function updatePassword(Request $request)
    {
        if (Auth::guard('guidance')->check()) {
            $user = Auth::guard('guidance')->user();
            // Validate the input
            $request->validate([
                'password' => 'required|string',
                'new_password' => 'required|string|min:6|max:255',
            ]);
            // Check if the current password matches
            if (!Hash::check($request->password, $user->password)) {
                return redirect()
                    ->back()
                    ->withErrors(['password' => 'The current password is incorrect.'])
                    ->withInput();
            }

            // Update the password
            $user->password = $request->new_password;
            $user->save();

            // Re-authenticate the user with the new password
            Auth::guard('guidance')->login($user);
            return redirect()->back()->with('success', 'Password updated successfully!');
        }

        return redirect()->route('guidance.login');
    }





    public function updateProfilePhoto(Request $request)
    {
        if (Auth::guard('guidance')->check()) {
            $user = Auth::guard('guidance')->user();

            $request->validate([
                'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('profile_photo')) {
                if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                    Storage::disk('public')->delete($user->profile);
                }

                $profilePhotoPath = $request->file('profile_photo')->store('profiles', 'public');
                $user->profile = $profilePhotoPath;
                $user->save();

                return redirect()->back()->with('success', 'Profile photo updated successfully!');
            }
        }

        return redirect()->back()->withErrors(['error' => 'Failed to update profile photo.']);
    }


    public function deleteProfilePhoto()
    {
        if (Auth::guard('guidance')->check()) {
            $user = Auth::guard('guidance')->user();

            if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                Storage::disk('public')->delete($user->profile);
            }
            $user->profile = null;
            $user->save();

            return redirect()->back()->with('success', 'Profile photo deleted successfully!');
        }

        return redirect()->back()->withErrors(['error' => 'Failed to delete profile photo. Please try again.']);
    }
}
