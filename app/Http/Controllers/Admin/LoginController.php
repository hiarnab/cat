<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentRegistrationMail;
use Illuminate\Support\Str;

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
            // 'password' => 'required'
        ]);

        $data = $request->all();

        $plainPassword = Str::random(10);
        $url = "https://cat.careerandcourses.com/student/login";
        // return $plainPassword;

        $users =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($plainPassword),
            'role_id' => 2
        ]);

        StudentDetails::create([
            'user_id' => $users->id,
            'name' => $data['name'],
            'address' => $data['address'],
            'current_class' => $data['current_class'],
            'school_name' => $data['school_name'],
            'future_stream' => $data['future_stream'],
            'mobile' => $data['mobile'],
            'guardian_mobile' => $data['guardian_mobile'],
            'guardian_whatsapp' => $data['guardian_whatsapp']
        ]);

        Mail::to($data['email'])->send(new StudentRegistrationMail($data['name'], $data['email'], $plainPassword,$url));

        return Redirect()->back()->with('success', 'You have successfully registered. Please check your email for login link.');
    }

    public function login_view()
    {
        return view('admin.login');
    }

    public function loggedin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]); 

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) { 
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role_id === 1) {   
                return redirect()->route('admin.dashboard')->with('success', 'Logged in Successfully');
            } elseif ($user->role_id === 2) {   
                return redirect()->route('start.test')->with('success', 'Logged in Successfully');
            }   
        } else {
            return redirect()->back();
        }
    }

    public function student_login_view()
    {
        return view('student.login');
    }

    public function student_loggedin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
 
            if ($user->role_id === 1) {
                return redirect()->route('admin.dashboard')->with('success', 'Logged in Successfully');
            } elseif ($user->role_id === 2) {
                return redirect()->route('start.test')->with('success', 'Logged in Successfully');
            }
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        $roleId = Auth::user()->role_id;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($roleId === 1) {
        return redirect()->route('login.view');
        } else {
            return redirect()->route('student.login');
        }
    }
}
