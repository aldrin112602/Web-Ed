<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }


    public function handleLogin(Request $request) {
        
    }


    public function signup()
    {
        return view('admin.auth.signup');
    }


    public function handleSignup(Request $request) {
        
    }
}
