<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            Auth::user();
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Username & Password do not match');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
