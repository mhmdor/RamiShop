<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'Incorrect email or password.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
