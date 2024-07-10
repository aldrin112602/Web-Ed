<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\AdminAccount;
use App\Models\GuidanceAccount;
use App\Models\StudentAccount;
use App\Models\TeacherAccount;
use App\Rules\TwoWords;

class AdminCreateController extends Controller
{
    public function createAdmin(Request $request)
    {
        $request->validate([
            'id_number' => 'required|min:5|max:255|unique:admin_accounts,id_number',
            'name' => ['required', 'string', 'max:255', new TwoWords],
            'gender' => 'required|string|in:Male,Female',
            'username' => 'required|string|unique:admin_accounts,username',
            'password' => 'required|string|min:6|max:255',
            'email' => 'nullable|email|unique:admin_accounts,email',
            'position' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'nullable|string|regex:/^(09|\+639)\d{9}$/'
        ]);

        $account = new AdminAccount($request->all());

        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
            $account->profile = $profilePath;
        }

        $account->save();
        return redirect()
            ->back()
            ->with('success', 'Account added successfully!');
    }

    public function createStudent(Request $request)
    {
        $request->validate([
            'id_number' => 'required|numeric|unique:students,id_number',
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'strand' => 'required|string',
            'grade' => 'required|numeric|between:11,12',
            'parents_contact_number' => 'required|string|regex:/^(09|\+639)\d{9}$/',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'username' => 'required|string|unique:students,username',
            'password' => 'required|string|min:8',
        ]);


    }

    public function createTeacher(Request $request)
    {
        $request->validate([
            'id_number' => 'required|min:5|max:255|unique:teacher_accounts,id_number',
            'name' => ['required', 'string', 'max:255', new TwoWords],
            'gender' => 'required|string|in:Male,Female',
            'position' => 'required|string|max:255',
            'username' => 'required|string|unique:teacher_accounts,username',
            'password' => 'required|string|min:6|max:255',
            'grade_handle' => 'required|string',
            'email' => 'nullable|email|unique:teacher_accounts,email',
            'role' => 'nullable|string|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'nullable|string|regex:/^(09|\+639)\d{9}$/'
        ]);
    
        $account = new TeacherAccount($request->all());

        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
            $account->profile = $profilePath;
        }

        $account->save();
        return redirect()
            ->back()
            ->with('success', 'Account added successfully!');


    }

    public function createGuidance(Request $request)
    {
        $request->validate([
            'id_number' => 'required|min:5|max:255|unique:guidance_accounts,id_number',
            'name' => ['required', 'string', 'max:255', new TwoWords],
            'gender' => 'required|string|in:Male,Female',
            'username' => 'required|string|unique:guidance_accounts,username',
            'password' => 'required|string|min:6|max:255',
            'email' => 'nullable|email|unique:guidance_accounts,email',
            'role' => 'nullable|string|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'nullable|string|regex:/^(09|\+639)\d{9}$/'
        ]);
    
        $account = new GuidanceAccount($request->all());

        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
            $account->profile = $profilePath;
        }

        $account->save();
        return redirect()
            ->back()
            ->with('success', 'Account added successfully!');
    }

    // View creates
    public function viewCreateAdmin()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.create.admin');
        }

        return redirect()->route('admin.login');
    }

    public function viewCreateStudent()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.create.student');
        }
        
        return redirect()->route('admin.login');
    }

    public function viewCreateTeacher()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.create.teacher');
        }
        
        return redirect()->route('admin.login');
    }

    public function viewCreateGuidance()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.create.guidance');
        }
        
        return redirect()->route('admin.login');
    }
}
