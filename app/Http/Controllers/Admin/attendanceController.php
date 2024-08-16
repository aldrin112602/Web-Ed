<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class attendanceController extends Controller
{

    public function attendaceReport()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.attendance.report', ['user' => $user]);
    }

    public function attendaceAbsent()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.attendance.absent', ['user' => $user]);
    }

    public function attendacePresent()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.attendance.present', ['user' => $user]);
    }
}
