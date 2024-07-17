<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\TwoWords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
class StudentController extends Controller
{
    public function login()
    {
        if (Auth::guard('student')->check()) {
            return redirect()->intended('student');
        }
        // Clear session
        Session::forget('otp_email');
        Session::forget('otp');

        return view('student.auth.login');
    }


    public function logout()
    {
        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
            return redirect()
                ->route('student.login')
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

        if (Auth::guard('student')->attempt($credentials, $request->filled('remember'))) {
            // Authentication passed

            return redirect()->intended('student');
        }

        // Authentication failed
        return redirect()->back()->withErrors([
            'password' => 'Invalid username or password.',
        ])->withInput($request->except('password'));
    }

    public function dashboard()
    {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
            return view('student.dashboard', ['user' => $user]);
        }

        return redirect()->route('student.login');
    }


    public function home()
    {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
            return view('student.home', ['user' => $user]);
        }

        return redirect()->route('student.login');
    }

    public function profile()
    {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
            return view('student.profile.profile', ['user' => $user]);
        }

        return redirect()->route('student.login');
    }



    public function updateAccount(Request $request)
    {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();

            // Validate the input
            $request->validate([
                'id_number' => 'required|min:5|max:255|unique:admin_accounts,id_number,' . $user->id,
                'name' => ['required', 'string', 'max:255', new TwoWords],
                'email' => 'required|email|max:255|unique:admin_accounts,email,' . $user->id,
                'gender' => 'required|string|in:Male,Female',
                'address' => 'required|string|max:255',
                'phone_number' => 'required|string|min:11|max:11',
            ]);


            $user->update([
                'name' => $request->name,
                'id_number' => $request->id_number,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'gender' => $request->gender,
            ]);

            // Re-authenticate the user with the new password
            Auth::guard('student')->login($user);

            return redirect()
                ->back()
                ->with('success', 'Profile updated successfully!');
        }

        return redirect()->route('student.login');
    }



    public function updatePassword(Request $request)
    {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();
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
            Auth::guard('student')->login($user);
            return redirect()->back()->with('success', 'Password updated successfully!');
        }

        return redirect()->route('student.login');
    }





    public function updateProfilePhoto(Request $request)
    {
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();

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
        if (Auth::guard('student')->check()) {
            $user = Auth::guard('student')->user();

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
