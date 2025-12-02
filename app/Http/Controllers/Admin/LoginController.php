<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function register_view()
    {
        return view('student.register');
    }

    public function register(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
        ]);

        $data = $request->all();

        User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password'])
        ]);

        StudentDetails::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'current_class' => $data['current_class'],
            'school_name' => $data['school_name'],
            'future_stream' => $data['future_stream'],
            'mobile' => $data['mobile'],
            'guardian_mobile'=> $data['guardian_mobile'],
            'guardian_whatsapp'=> $data['guardian_whatsapp']
        ]); 

        return Redirect()->back();
    }

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
