<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class AnnouncementControler extends Controller
{
    public function announcements() {
        $announcements = Announcement::with('teacher')->latest()->get();
        $user = Auth::user();
        return view('student.announcement', compact('announcements', 'user'));
    }

    

}
