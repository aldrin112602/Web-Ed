<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherGradeHandle;
use App\Models\Student\StudentAccount;
use Illuminate\Support\Facades\Storage;
use App\Models\StudentImage;
use App\Models\History;
use App\Rules\TwoWords;





class StudentController extends Controller
{
    // return the list of all students
    public function index(Request $request)
    {
        $user = Auth::user();
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();

        $id = $request->query('id');
        \Log::info('Grade Handle ID:', ['id' => $id]);

        if (!$id || !TeacherGradeHandle::find($id)) {
            return redirect()->route('teacher.dashboard')->with('error', 'Invalid grade handle ID');
        }


        $grade_handle = TeacherGradeHandle::find($id);
        $query = StudentAccount::query();

        // Apply gender filter
        if ($request->has('gender') && $request->gender != '' && $request->gender != 'All') {
            $query->where('gender', $request->gender);
        }


        $grade_handle = TeacherGradeHandle::find($id);

        $query->where('grade', $grade_handle->grade);
        $query->where('strand', $grade_handle->strand);
        $query->where('section', $grade_handle->section);


        // Only get students taught by the teacher with the specified grade handle
        $account_list = $query->whereHas('studentHandles', function ($q) use ($user, $id) {
            $q
            ->where('teacher_id', $user->id)
            ->where('grade_handle_id', $id);
        })->paginate(10);


        $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();




        return view('teacher.students.index', [
            'user' => $user,
            'id' => $id,
            'handleSubjects' => $handleSubjects,
            'account_list' => $account_list,
            'grade_handle' => $grade_handle
        ]);
    }



    public function editStudent($id)
    {
        if (Auth::guard('teacher')->check()) {
            $user = Auth::guard('teacher')->user();
            $student = StudentAccount::findOrFail($id);
            $handleSubjects = TeacherGradeHandle::where('teacher_id', $user->id)->get();

            return view('teacher.students.edit_student', ['user' => $user, 'student' => $student, 'handleSubjects' => $handleSubjects]);
        }

        return redirect()->route('teacher.login');
    }





    public function updateStudent(Request $request, $id)
    {
        if (Auth::guard('teacher')->check()) {
            $user = StudentAccount::findOrFail($id);

            $request->validate([
                'name' => ['required', 'string', 'max:255', new TwoWords],
                'new_password' => 'nullable|string|min:6|max:255',
                'parents_contact_number' => 'required|string|min:11|max:11',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'phone_number' => 'required|string|min:11|max:11',
                'address' => 'nullable|string|max:255',
                'parents_email' => 'required',
                'extension_name' => 'nullable|string|max:255',
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
                'parents_email' => $request->parents_email,
                'grade' => $request->grade,
                'extension_name' => $request->extension_name,
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
            }


            if ($request->hasFile('face_images') && count($request->file('face_images')) === 3) {
                StudentImage::where('student_id', $user->id)->delete();

                foreach ($request->file('face_images') as $index => $file) {
                    $imagePath = $file->storeAs('face_images/' . $user->name, "$index.jpg", 'public');

                    StudentImage::create([
                        'student_id' => $user->id,
                        'image_path' => $imagePath,
                    ]);
                }
            }



            $user->save();

            $auth_user = Auth::user();
            History::create(
                [
                    'user_id' => $auth_user->id,
                    'position' => $auth_user->role,
                    'history' => "Updated user account",
                    'description' => 'ID Number: ' . $user->id_number . ', Name: ' . $user->name
                ]
            );

            return redirect()->route('teacher.student_list')->with('success', 'Student updated successfully');
        }

        return redirect()->route('teacher.login');
    }
    /////////////////// END /////////////////////
}
