<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin\AdminAccount;
use App\Models\Guidance\GuidanceAccount;
use App\Models\Student\StudentAccount;
use App\Models\Teacher\TeacherAccount;
use App\Rules\TwoWords;
use App\Models\StudentImage;
use App\Models\History;

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
            'email' => 'required|email|unique:admin_accounts,email',
            'position' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif',
            'phone_number' => 'required|string|min:11|max:11'
        ]);

        $account = new AdminAccount($request->all());

        $profilePath = $request->file('profile')->store('profiles', 'public');
        $account->profile = $profilePath;

        $account->save();

        $auth_user = Auth::user();
        History::create(
            [
                'user_id' => $auth_user->id,
                'position' => $auth_user->role,
                'history' => "Create admin account",
                'description' => 'ID Number: ' . $account->id_number . ', Name: ' . $account->name
            ]
        );

        return redirect()
            ->back()
            ->with('success', 'Account added successfully!');
    }

    public function createStudent(Request $request)
    {
        $request->validate([
            'id_number' => 'required|min:5|max:255|unique:student_accounts,id_number',
            'name' => ['required', 'string', 'max:255', new TwoWords],
            'gender' => 'required|string|in:Male,Female',
            'username' => 'required|string|unique:student_accounts,username',
            'password' => 'required|string|min:6|max:255',
            'strand' => 'required',
            'grade' => 'required',
            'parents_contact_number' => 'required|string|min:11|max:11',
            'email' => 'required|email|unique:student_accounts,email',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'phone_number' => 'required|string|min:11|max:11',
            'face_images' => 'required|array|min:3|max:3',
            'face_images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $account = new StudentAccount($request->all());

        $profilePath = $request->file('profile')->store('profiles', 'public');
        $account->profile = $profilePath;
        $account->save();

        if ($request->hasFile('face_images')) {
            foreach ($request->file('face_images') as $index => $file) {
                $imagePath = $file->storeAs('face_images/' . $account->name, "$index.jpg", 'public');
                StudentImage::create([
                    'student_id' => $account->id,
                    'image_path' => $imagePath,
                ]);
            }
        }


        $auth_user = Auth::user();
        History::create(
            [
                'user_id' => $auth_user->id,
                'position' => $auth_user->role,
                'history' => "Create student account",
                'description' => 'ID Number: ' . $account->id_number . ', Name: ' . $account->name
            ]
        );

        return redirect()
            ->back()
            ->with('success', 'Account added successfully!');
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
            'email' => 'required|email|unique:teacher_accounts,email',
            'role' => 'nullable|string|max:255',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif',
            'phone_number' => 'required|string|min:11|max:11'
        ]);

        $account = new TeacherAccount($request->all());

        $profilePath = $request->file('profile')->store('profiles', 'public');
        $account->profile = $profilePath;


        $account->save();
        $auth_user = Auth::user();
        History::create(
            [
                'user_id' => $auth_user->id,
                'position' => $auth_user->role,
                'history' => "Create teacher account",
                'description' => 'ID Number: ' . $account->id_number . ', Name: ' . $account->name
            ]
        );
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
            'email' => 'required|email|unique:guidance_accounts,email',
            'role' => 'nullable|string|max:255',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif',
            'phone_number' => 'required|string|min:11|max:11'
        ]);

        $account = new GuidanceAccount($request->all());

        $profilePath = $request->file('profile')->store('profiles', 'public');
        $account->profile = $profilePath;


        $account->save();
        $auth_user = Auth::user();
        History::create(
            [
                'user_id' => $auth_user->id,
                'position' => $auth_user->role,
                'history' => "Create guidance account",
                'description' => 'ID Number: ' . $account->id_number . ', Name: ' . $account->name
            ]
        );
        return redirect()
            ->back()
            ->with('success', 'Account added successfully!');
    }

    // View creates
    public function viewCreateAdmin()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $id_number = $this->getRandomNumbers();
            return view('admin.create.admin', ['user' => $user, 'id_number' => $id_number]);
        }


        return redirect()->route('admin.login');
    }

    public function viewCreateStudent()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $id_number = $this->getRandomNumbers();
            return view('admin.create.student', ['user' => $user, 'id_number' => $id_number]);
        }

        return redirect()->route('admin.login');
    }

    public function viewCreateTeacher()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $id_number = $this->getRandomNumbers();
            return view('admin.create.teacher', ['user' => $user, 'id_number' => $id_number]);
        }

        return redirect()->route('admin.login');
    }

    public function viewCreateGuidance()
    {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $id_number = $this->getRandomNumbers();
            return view('admin.create.guidance', ['user' => $user, 'id_number' => $id_number]);
        }

        return redirect()->route('admin.login');
    }

    public function getRandomNumbers($count = 1)
    {
        $randomNumbers = [];
        for ($i = 0; $i < $count; $i++) {
            $randomNumbers[] = rand(1000000000, 9999999999);
        }
        return $randomNumbers[0];
    }
}
