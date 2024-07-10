<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->intended('admin');
        }
        return view('admin.auth.login');
    }

    public function handleLogin(Request $request)
    {
        // Validate the input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            // Authentication passed
            return redirect()->intended('admin');
        }

        // Authentication failed
        return redirect()->back()->withErrors([
            'password' => 'Invalid username or password.',
        ])->withInput($request->except('password'));
    }

    public function dashboard()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard');
        }

        return redirect()->route('admin.login');
    }


    public function home()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.home');
        }

        return redirect()->route('admin.login');
    }
}
