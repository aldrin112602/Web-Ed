<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentAccount;
use App\Models\AdminAccount;
use App\Models\TeacherAccount;
use App\Models\GuidanceAccount;


class AccountManagementController extends Controller
{
    public function student_list() {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $account_list = StudentAccount::paginate(10);
            return view('admin.account_management.student_list', ['user' => $user, 'account_list' => $account_list]);
        }

        return redirect()->route('admin.login');
    }

    public function admin_list() {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $account_list = AdminAccount::paginate(10);
            return view('admin.account_management.admin_list', ['user' => $user, 'account_list' => $account_list]);
        }

        return redirect()->route('admin.login');
    }

    public function teacher_list() {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $account_list = TeacherAccount::paginate(10);
            return view('admin.account_management.teacher_list', ['user' => $user, 'account_list' => $account_list]);
        }

        return redirect()->route('admin.login');
    }

    public function guidance_list() {
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $account_list = TeacherAccount::paginate(10);
            return view('admin.account_management.guidance_list', ['user' => $user, 'account_list' => $account_list]);
        }

        return redirect()->route('admin.login');
    }
}
