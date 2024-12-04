<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);

        return view('posts.dashboard')->with('posts', $user->posts)->with('title', 'Dashboard');
    }
}
