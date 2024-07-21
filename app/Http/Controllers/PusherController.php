<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student\StudentAccount;
use App\Models\Admin\AdminAccount;
use App\Models\Teacher\TeacherAccount;
use App\Models\Guidance\GuidanceAccount;

class PusherController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        $teachers = TeacherAccount::all();
        $admins = AdminAccount::all();
        $students = StudentAccount::all();
        $guidances = GuidanceAccount::all();

        // Merge all collections
        $allUsers = [...$teachers, ...$admins, ...$students, ...$guidances];
        return view(
            'admin.message.index',
            [
                'user' => $user,
                'allUsers' => $allUsers
            ]
        );
    }


    public function broadcast(Request $request)
    {
        broadcast(new PusherBroadcast($request->get('message')))->toOthers();
        $user = Auth::guard('admin')->user();

        return view('admin.message.broadcast', ['message', $request->get('message'), 'user' => $user]);
    }

    public function receive(Request $request)
    {
        $user = Auth::guard('admin')->user();
        return view('admin.message.receive', ['message', $request->get('message'), 'user' => $user]);
    }
}
