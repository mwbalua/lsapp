<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Welcome to Laravel';

        return view('pages.index', ['title' => $title]);
    }

    public function about() {
        $title = "About Us";

        return view('pages.about', ['title' => $title]);
    }

    public function services() {
        $data = [
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        ];

        return view('pages.services', $data);
    }
}
