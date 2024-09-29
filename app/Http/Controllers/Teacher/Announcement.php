<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement as AnnouncementModel;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherGradeHandle;

class Announcement extends Controller
{
    // Display Announcements for the teacher
    public function announcements()
    {
        $user = Auth::user();
        $teacher_id = $user->id;
        $announcements = AnnouncementModel::where('teacher_id', $teacher_id)->get();
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $teacher_id)->get();

        return view('teacher.announcements', compact('announcements', 'handleSubjects', 'user'));
    }

    // Store a new Announcement
    public function makeAnnouncement(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'announcement' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $newAnnouncement = new AnnouncementModel([
            'title' => $request->title,
            'announcement' => $request->announcement,
            'grade_handle_id' => $request->query('id'),
            'teacher_id' => Auth::guard('teacher')->user()->id,
        ]);

        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachments', 'public');
            $newAnnouncement->file_path = $filePath;
        }

        $newAnnouncement->save();

        return redirect()->route('teacher.announcements')->with('success', 'Announcement made successfully!');
    }

    // Edit an Announcement
    public function editAnnouncement($id)
    {
        $announcement = AnnouncementModel::findOrFail($id);
        $user = Auth::user();
        $teacher_id = $user->id;
        $handleSubjects = TeacherGradeHandle::where('teacher_id', $teacher_id)->get();

        return view('teacher.edit_announcement', compact('announcement', 'handleSubjects', 'user'));
    }

    // Update an Announcement
    public function updateAnnouncement(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'announcement' => 'required|string',
        ]);

        $announcement = AnnouncementModel::findOrFail($id);
        $announcement->update($request->only(['title', 'announcement']));

        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachments', 'public');
            $announcement->file_path = $filePath;
        }

        return redirect()->route('teacher.announcements')->with('success', 'Announcement updated successfully!');
    }

    // Delete an Announcement
    public function deleteAnnouncement($id)
    {
        $announcement = AnnouncementModel::findOrFail($id);
        $announcement->delete();

        return redirect()->route('teacher.announcements')->with('success', 'Announcement deleted successfully!');
    }
}
