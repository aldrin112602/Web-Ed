<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\TwoWords;
use Illuminate\Support\Facades\{Hash, Auth, Storage, Session};
use App\Models\{Admin\SubjectModel, TeacherGradeHandle, StudentHandle};
use App\Models\Student\StudentAccount;
use App\Models\Student\AttendanceHistory;
use App\Models\Teacher\TeacherAccount;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{

    public function attendanceReport()
    {
        $user = Auth::guard('teacher')->user();
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();
        return view('teacher.attendance_report', ['user' => $user, 'handleSubjects' => $handleSubjects]);
    }


    public function attendanceHistory()
    {
        $user = Auth::guard('teacher')->user();
        $attendace_histories = AttendanceHistory::all();
        return view('teacher.attendance_history', [
            'user' => $user,
            'attendace_histories' => $attendace_histories,
            'account_list' => StudentAccount::paginate(10)
        ]);
    }


    public function viewAttendanceHistory($id)
    {
        $user = Auth::guard('teacher')->user();
        $attendace_histories = AttendanceHistory::where('student_id', $id)->get();
        return view('teacher.view_attendance_history', [
            'user' => $user,
            'attendace_histories' => $attendace_histories,
            'TeacherGradeHandle' => TeacherGradeHandle::class,
            'SubjectModel' => SubjectModel::class,
            'TeacherAccount' => TeacherAccount::class,
            'student' => StudentAccount::where('id', $id)->first()
        ]);
    }


    public function login()
    {
        if (Auth::guard('teacher')->check()) {
            return redirect()->intended('teacher/dashboard');
        }
        // Clear session
        Session::forget('otp_email');
        Session::forget('otp');

        return view('teacher.auth.login');
    }


    public function logout()
    {
        if (Auth::guard('teacher')->check()) {
            Auth::guard('teacher')->logout();
            return redirect()
                ->route('teacher.login')
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

        // Manually verify credentials without logging in
        if (
            Auth::guard('teacher')->getProvider()->retrieveByCredentials($credentials) &&
            Auth::guard('teacher')->getProvider()->validateCredentials(
                $user = Auth::guard('teacher')->getProvider()->retrieveByCredentials($credentials),
                $credentials
            )
        ) {
            // Credentials are valid

            // Generate OTP
            $otp = random_int(100000, 999999); // Generates a 6-digit OTP

            // Send OTP via Mail API
            $email = $user->email;

            // Prepare data for the API request
            $data = [
                'recipient' => $email,
                'subject' => 'Your OTP Code',
                'html' => "
                    <html>
                        <body style='font-family: Arial, sans-serif;'>
                            <div style='max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd;'>
                                <h2 style='color: #4CAF50;'>Your OTP Code</h2>
                                <p style='font-size: 16px;'>Hello,</p>
                                <p style='font-size: 16px;'>Your OTP code is:</p>
                                <p style='font-size: 24px; font-weight: bold; color: #333;'>$otp</p>
                                <p style='font-size: 16px;'>Please enter this code to complete your login process. The code will expire in 10 minutes.</p>
                                <br>
                                <p style='font-size: 14px; color: #666;'>Best regards,<br>WebEd Team</p>
                            </div>
                        </body>
                    </html>",
                'from_name' => 'WebEd',
                'from_mail' => 'noreply@yourapp.com'
            ];


            $response = Http::post('https://mail-api-v1.onrender.com/api/email/send', $data);

            if ($response->successful()) {

                // Store user and OTP data in session using Session::put
                Session::put('otp', $otp);
                Session::put('otp_expiry', now()->addMinutes(10));
                Session::put('pending_user_id', $user->id);

                // Redirect to OTP verification page
                return redirect()->route('teacher.2fa.index');
            }

            // Handle case if OTP sending fails
            return redirect()->back()->with(
                'error',
                'Failed to send OTP. Please try again.',
            );
        }

        // Authentication failed
        return redirect()->back()->withErrors([
            'password' => 'Invalid username or password.',
        ])->withInput($request->except('password'));
    }



    public function dashboard()
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
            $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();
            $allStudentsCount = count(StudentHandle::where('teacher_id', $user->id)->get());

            return view(
                'teacher.dashboard',
                [
                    'user' => $user,
                    'handleSubjects' => $handleSubjects,
                    "allStudentsCount" => $allStudentsCount
                ]
            );
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


    public function profile()
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
            $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();
            return view('teacher.profile.profile', ['user' => $user, 'handleSubjects' => $handleSubjects]);
        }

        return redirect()->route('teacher.login');
    }



    public function updateAccount(Request $request)
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();

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
            Auth::guard('teacher')->login($user);

            return redirect()
                ->back()
                ->with('success', 'Profile updated successfully!');
        }

        return redirect()->route('teacher.login');
    }



    public function updatePassword(Request $request)
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
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
            Auth::guard('teacher')->login($user);
            return redirect()->back()->with('success', 'Password updated successfully!');
        }

        return redirect()->route('teacher.login');
    }





    public function updateProfilePhoto(Request $request)
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();

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
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();

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
