<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Account extends Controller
{
    public function viewAddStudent()
    {
        $user = Auth::user();
        $id_number = $this->getRandomNumbers();
        return view('admin.create.admin', ['user' => $user, 'id_number' => $id_number]);
        return view('teacher.account.add_student');
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
