<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_view()
    {
        return view('admin.login');
    }

    public function loggedin(Request $request)
    {
        $request->validate([
            'email'=> 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success', 'Logged in Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.view');
    }
}
