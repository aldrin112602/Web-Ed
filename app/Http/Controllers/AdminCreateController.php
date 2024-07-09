<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCreateController extends Controller
{
    public function createAdmin(Request $request) {

    }

    public function createStudent(Request $request) {

    }

    public function createTeacher(Request $request) {

    }

    public function createGuidance(Request $request) {

    }




    // Viewssss creates
    public function viewCreateAdmin() {
        return view('admin.create.admin');
    }

    public function viewCreateStudent() {
        return view('admin.create.student');
    }

    public function viewCreateTeacher() {
        return view('admin.create.teacher');
    }

    public function viewCreateGuidance() {
        return view('admin.create.guidance');
    }

}
