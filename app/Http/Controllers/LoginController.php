<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create() {
        return view('pages.login');
    }
    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('posts')->with('success', 'Welcome back ' . auth()->user()->name . "!");
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ]);
    }

    public function destroy() {
        Auth::logout();

        return redirect('/');
    }
}
