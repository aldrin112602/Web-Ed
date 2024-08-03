<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherGradeHandle;
use App\Models\StudentImage;
use App\Rules\TwoWords;
use App\Models\Student\StudentAccount;
use App\Models\History;


class Account extends Controller
{
    public function viewAddStudent()
    {
        $user = Auth::user();
        $id_number = $this->getRandomNumbers();
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();
        $id = request()->query('id');
        if (!$id || !TeacherGradeHandle::find($id)) {
            return redirect()->route('teacher.dashboard')->with('error', 'Invalid grade handle ID');
        }
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();
        $grade_handle = TeacherGradeHandle::find($id);

        return view('teacher.account.add_student', ['user' => $user, 'id_number' => $id_number, 'handleSubjects' => $handleSubjects, 'grade_handle' => $grade_handle]);
    }



    public function submitAddStudent(Request $request)
    {
        $request->validate([
            'id_number' => 'required|min:5|max:255|unique:student_accounts,id_number',
            'name' => ['required', 'string', 'max:255', new TwoWords],
            'gender' => 'required|string|in:Male,Female',
            'username' => 'required|string|unique:student_accounts,username',
            'password' => 'required|string|min:6|max:255',
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









    public function getRandomNumbers($count = 1)
    {
        $randomNumbers = [];
        for ($i = 0; $i < $count; $i++) {
            $randomNumbers[] = rand(100000, 999999);
        }
        return $randomNumbers[0];
    }
}
