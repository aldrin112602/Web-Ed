<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Attendance extends Controller
{
    public function absents() {
        return view('teacher.students.absents');
    }

    public function presents() {
        return view('teacher.students.presents');
    }
}
