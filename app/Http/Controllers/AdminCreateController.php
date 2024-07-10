<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminAccount;
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
            'phone_number' => 'nullable|string|regex:/^[0-9]{10,15}$/'
        ]);

        $adminAccount = new AdminAccount($request->all());

        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
            $adminAccount->profile = $profilePath;
        }

        $adminAccount->save();
        return redirect()
            ->back()
            ->with('success', 'Admin account added successfully!');
    }

    public function createStudent(Request $request)
    {
        $request->validate([
            'id_number' => 'required|numeric|unique:students,id_number',
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'strand' => 'required|string',
            'grade' => 'required|numeric|between:11,12',
            'parents_contact_number' => 'required|string|regex:/^[0-9]{10,15}$/',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'username' => 'required|string|unique:students,username',
            'password' => 'required|string|min:8',
        ]);

        // Code to create student goes here
    }

    public function createTeacher(Request $request)
    {
        $request->validate([
            'id_number' => 'required|numeric|unique:teachers,id_number',
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'position' => 'required|string|max:255',
            'grade_handle' => 'required|string',
            'username' => 'required|string|unique:teachers,username',
            'password' => 'required|string|min:8',
        ]);

        // Code to create teacher goes here
    }

    public function createGuidance(Request $request)
    {
        $request->validate([
            'id_number' => 'required|numeric|unique:guidances,id_number',
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'username' => 'required|string|unique:guidances,username',
            'password' => 'required|string|min:8',
        ]);

        // Code to create guidance counselor goes here
    }

    // View creates
    public function viewCreateAdmin()
    {
        return view('admin.create.admin');
    }

    public function viewCreateStudent()
    {
        return view('admin.create.student');
    }

    public function viewCreateTeacher()
    {
        return view('admin.create.teacher');
    }

    public function viewCreateGuidance()
    {
        return view('admin.create.guidance');
    }
}
