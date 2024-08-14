<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement as AnnouncementModel;
use Illuminate\Support\Facades\Auth;

class Announcement extends Controller
{
    public function makeAnnouncement(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'announcement' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        // Create a new Announcement instance
        $newAnnouncement = new AnnouncementModel([
            'title' => $request->title,
            'announcement' => $request->announcement,
            'grade_handle_id' => $request->query('id'),
            'teacher_id' => Auth::guard('teacher')->user()->id,
        ]);

        // Handle file attachment if present
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachments', 'public');
            $newAnnouncement->file_path = $filePath;
        }

        $newAnnouncement->save();

        return redirect()->route('teacher.student_list', ['id' => $request->query('id')])->with('success', 'Announcement made successfully!');
    }
}
