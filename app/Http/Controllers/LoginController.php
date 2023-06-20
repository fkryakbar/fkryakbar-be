<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->to('/statistics');
        }
        return view('login.index');
    }

    public function login(Request $request)
    {
        $credentials =  $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            return redirect()->intended('statistics');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
