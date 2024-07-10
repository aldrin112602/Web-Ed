<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AdminAccount;
use App\Rules\TwoWords;


// For testing use only

class PublicAuth extends Controller
{
    public function login() {
        return redirect()->intended('/');
    }


    public function createAdmin(Request $request)
    {
        $request->validate([
            'id_number' => 'required|min:5|max:255|unique:admin_accounts,id_number',
            'name' => ['required', 'string', 'max:255', new TwoWords],
            'gender' => 'required|string|in:Male,Female',
            'username' => 'required|string|unique:admin_accounts,username',
            'password' => 'required|string|min:6|max:255',
            'email' => 'nullable|email|unique:admin_accounts,email',
            'position' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif',
            'phone_number' => 'nullable|string|min:11|max:11'
        ]);

        $account = new AdminAccount($request->all());

        $profilePath = $request->file('profile')->store('profiles', 'public');
        $account->profile = $profilePath;

        $account->save();

        return redirect()
            ->back()
            ->with('success', 'Account added successfully!');
    }
}
