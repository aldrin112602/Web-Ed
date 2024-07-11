<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\TwoWords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->intended('admin');
        }
        return view('admin.auth.login');
    }


    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect()
                ->route('admin.login')
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

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // Authentication passed

            return redirect()->intended('admin');
        }

        // Authentication failed
        return redirect()->back()->withErrors([
            'password' => 'Invalid username or password.',
        ])->withInput($request->except('password'));
    }

    public function dashboard()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            return view('admin.dashboard', ['user' => $user]);
        }

        return redirect()->route('admin.login');
    }


    public function home()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            return view('admin.home', ['user' => $user]);
        }

        return redirect()->route('admin.login');
    }

    public function profile()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            return view('admin.profile.profile', ['user' => $user]);
        }

        return redirect()->route('admin.login');
    }



    public function updateAccount(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();

            // Validate the input
            $request->validate([
                'name' => ['required', 'string', 'max:255', new TwoWords],
                'gender' => 'required|string|in:Male,Female',
                'address' => 'required|string|max:255',
                'phone_number' => 'required|string|min:11|max:11'
            ]);

            if ($user->id_number != $request->id_number) {
                $request->validate([
                    'id_number' => 'required|min:5|max:255|unique:admin_accounts,id_number'
                ]);
            }

            if ($user->email != $request->email) {
                $request->validate([
                    'email' => 'required|email|unique:admin_accounts,email',
                ]);
            }

            $user->update([
                'name' => $request->name,
                'id_number' => $request->id_number,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'gender' => $request->gender,
            ]);

            // Re-authenticate the user with the new password
            Auth::guard('admin')->login($user);

            return redirect()
                ->back()
                ->with('success', 'Profile updated successfully!');
        }

        return redirect()->route('admin.login');
    }



    public function updatePassword(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
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
            Auth::guard('admin')->login($user);
            return redirect()->back()->with('success', 'Password updated successfully!');
        }

        return redirect()->route('admin.login');
    }





    public function updateProfilePhoto(Request $request)
{
    if (Auth::guard('admin')->check()) {
        $user = Auth::guard('admin')->user();

        // Validate the uploaded file
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload and update user profile
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


    
}
