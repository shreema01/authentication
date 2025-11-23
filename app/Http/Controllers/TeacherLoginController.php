<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('teacher.auth.login');
     
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('teacher')->attempt($credentials)) {
            return redirect()->intended('/teacher/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials or unauthorized access.',
        ]);
    }
     public function dashboard()
    {
        return view('teacher.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();
        $request->session()->invalidate();  
        $request->session()->regenerateToken();
        return redirect('/teacher/login');
    }
}
