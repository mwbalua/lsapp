<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create() {
        return view('pages.register');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect('/login')->with('success', 'Account created successfully');
    }
}
